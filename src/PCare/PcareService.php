<?php

declare(strict_types=1);

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use LZCompressor\LZString;

class PcareService
{
    /**
     * Guzzle HTTP Client object
     */
    private Client $clients;

    /**
     * Request headers
     */
    private array $headers;

    /**
     * X-cons-id header value
     */
    private int $consId;

    /**
     * X-Timestamp header value
     */
    private string $timestamp;

    /**
     * X-Signature header value
     */
    private string $signature;

    /**
     * X-Authorization header value
     */
    private string $authorization;

    private string $secretKey;

    private string $username;

    private string $password;

    private string $appCode;

    private string $baseUrl;

    private string $serviceName;

    private string $userKey;

    protected string $feature;

    public string $keyDecrypt;

    public const CONTENT_TYPE = 'text/plain';

    public const ACCEPT_HEADER = 'application/json';

    public function __construct($configurations = [])
    {
        $this->clients = new Client([
            'verify' => false,
        ]);

        foreach ($configurations as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        }

        //set X-Timestamp, X-Signature, and finally the headers
        $this->setTimestamp()->setSignature()->setAuthorization()->setHeaders();
    }

    public function keyword($keyword): static
    {
        $this->feature .= "/{$keyword}";

        return $this;
    }

    /**
     * @throws JsonException
     */
    public function responseDecoded($response)
    {
        // ubah ke array
        $responseArray = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        if (! is_array($responseArray)) {
            return [
                'metaData' => [
                    'message' => $responseArray,
                    'code' => 201,
                ],
            ];
        }

        if (! isset($responseArray['response'])) {
            return $responseArray;
        }

        $responseDecrypt = $this->stringDecrypt($responseArray['response']);
        $responseArrayDecrypt = json_decode($responseDecrypt, true, 512, JSON_THROW_ON_ERROR);

        // apabila bukan array
        if (! is_array($responseArrayDecrypt) || $responseDecrypt === '') {
            return $responseArray;
        }

        $responseArray['response'] = $responseArrayDecrypt;

        return $responseArray;
    }

    /**
     * @throws JsonException
     */
    public function index($start = null, $limit = null)
    {
        $feature = $this->feature;
        if ($start !== null && $limit !== null) {
            $response = $this->get("{$feature}/{$start}/{$limit}");
        } else {
            $response = $this->get((string) ($feature));
        }

        return $this->responseDecoded($response);
    }

    private function setFeature(): string
    {
        return $this->feature;
    }

    /**
     * @throws JsonException
     */
    public function show($keyword = null, $start = null, $limit = null)
    {
        $feature = $this->setFeature();
        if ($start !== null && $limit !== null) {
            $response = $this->get("{$feature}/{$keyword}/{$start}/{$limit}");
        } elseif ($keyword !== null) {
            $response = $this->get("{$feature}/{$keyword}");
        } else {
            $response = $this->get($feature);
        }

        return $this->responseDecoded($response);
    }

    /**
     * @throws JsonException
     */
    public function store($data = [])
    {
        $response = $this->post($this->feature, $data);

        return $this->responseDecoded($response);
    }

    /**
     * @throws JsonException
     */
    public function update($data = [])
    {
        $response = $this->put($this->feature, $data);

        return $this->responseDecoded($response);
    }

    /**
     * @throws JsonException
     */
    public function destroy($keyword = null, $parameters = [])
    {
        $response = $this->delete($this->feature, $keyword, $parameters);

        return $this->responseDecoded($response);
    }

    protected function setHeaders(): static
    {
        $this->headers = [
            'X-cons-id' => $this->consId,
            'X-Timestamp' => $this->timestamp,
            'X-Signature' => $this->signature,
            'X-Authorization' => $this->authorization,
            'user_key' => $this->userKey,
        ];

        return $this;
    }

    protected function setTimestamp(): static
    {
        date_default_timezone_set('UTC');
        $this->timestamp = (string) (time() - strtotime('1970-01-01 00:00:00'));

        date_default_timezone_set(config('bpjs-bridging.app_timezone'));

        return $this;
    }

    protected function setHashData(): string
    {
        return "{$this->consId}&{$this->timestamp}";
    }

    protected function setSignature(): static
    {
        $signature = hash_hmac('sha256', $this->setHashData(), $this->secretKey, true);
        $encodedSignature = base64_encode($signature);
        $this->keyDecrypt = "$this->consId$this->secretKey$this->timestamp";
        $this->signature = $encodedSignature;

        return $this;
    }

    protected function setAuthorization(): static
    {
        $data = "{$this->username}:{$this->password}:{$this->appCode}";
        $encodedAuth = base64_encode($data);
        $this->authorization = "Basic {$encodedAuth}";

        return $this;
    }

    protected function getClients(): Client
    {
        return $this->clients;
    }

    protected function addHeader($key, $value): void
    {
        $this->headers[$key] = $value;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    private function stringDecrypt($string): ?string
    {
        $encryptMethod = 'AES-256-CBC';
        $keyHash = hex2bin(hash('sha256', $this->keyDecrypt));
        $iv = substr(hex2bin(hash('sha256', $this->keyDecrypt)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);

        return LZString::decompressFromEncodedURIComponent($output);
    }

    protected function get($feature, $parameters = []): string
    {
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';
        try {
            $response = $this->clients->request(
                'GET',
                "{$this->baseUrl}/{$this->serviceName}/{$feature}{$this->getParams($parameters)}",
                [
                    'headers' => $this->headers,
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        } catch (GuzzleException $e) {
            $response = $e->getMessage();
        }

        return $response;
    }

    protected function post($feature, $data = [], $headers = []): string
    {
        $this->setHeaderContent();

        if (! empty($headers)) {
            $this->headers = array_merge($this->headers, $headers);
        }
        try {
            $response = $this->clients->request(
                'POST',
                "{$this->baseUrl}/{$this->serviceName}/{$feature}",
                [
                    'headers' => $this->headers,
                    'body' => json_encode($data, JSON_THROW_ON_ERROR),
                ]
            )->getBody()->getContents();
        } catch (GuzzleException $e) {
            $response = $e->getMessage();
        } catch (JsonException $e) {
            $response = $e->getMessage();
        }

        return $response;
    }

    protected function setHeaderContent(): void
    {
        $this->headers['Content-Type'] = self::CONTENT_TYPE;
        $this->headers['Accept'] = self::ACCEPT_HEADER;
    }

    protected function put($feature, $data = []): string
    {
        $this->setHeaderContent();
        try {
            $response = $this->clients->request(
                'PUT',
                "{$this->baseUrl}/{$this->serviceName}/{$feature}",
                [
                    'headers' => $this->headers,
                    'body' => json_encode($data, JSON_THROW_ON_ERROR),
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        } catch (GuzzleException $e) {
            $response = $e->getMessage();
        }

        return $response;
    }

    protected function delete($feature, $id, $parameters = []): string
    {
        $this->setHeaderContent();
        $url = "{$this->baseUrl}/{$this->serviceName}";
        if ($id !== null) {
            $url .= "/{$feature}/{$id}";
        } else {
            $url .= "/{$feature}";
        }
        try {
            $response = $this->clients->request(
                'DELETE',
                "{$url}{$this->getParams($parameters)}",
                [
                    'headers' => $this->headers,
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        } catch (GuzzleException $e) {
            $response = $e->getMessage();
        }

        return $response;
    }

    private function getParams($parameters): string
    {
        $params = '';
        foreach ($parameters as $key => $value) {
            if (is_int($key)) {
                $params .= "/{$value}";
            } else {
                $params .= "/{$key}/{$value}";
            }
        }

        return $params;
    }
}
