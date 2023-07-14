<?php

namespace HanzoAsashi\LaravelBpjsBridging;

use GuzzleHttp\Client;

class LaravelBpjsBridging
{
    /**
     * Guzzle HTTP Client object
     * @var \GuzzleHttp\Client
     */
    private Client $clients;

    /**
     * Request headers
     * @var array
     */
    private array $headers;

    /**
     * X-cons-id header value
     * @var int
     */
    private int $consId;

    /**
     * X-Timestamp header value
     * @var string
     */
    private string $timestamp;

    /**
     * X-Signature header value
     * @var string
     */
    private string $signature;

    /**
     * @var string
     */
    private string $secretKey;

    /**
     * @var string
     */
    private string $baseUrl;

    /**
     * @var string
     */
    private string $userKey;

    /**
     * @var string
     */
    private string $serviceName;

    public function __construct($configurations)
    {
        $this->clients = new Client([
            'verify' => false
        ]);

        foreach ($configurations as $key => $val){
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        }

        //set X-Timestamp, X-Signature, and finally the headers
        $this->setTimestamp()->setSignature()->setHeaders();
    }

    protected function setHeaders(): static
    {
        $this->headers = [
            'X-cons-id' => $this->consId,
            'X-Timestamp' => $this->timestamp,
            'X-Signature' => $this->signature,
            'user_key' => $this->userKey,
        ];
        return $this;
    }

    protected function setTimestamp(): static
    {
        date_default_timezone_set('UTC');
        $this->timestamp = (string)(time() - strtotime('1970-01-01 00:00:00'));
        return $this;
    }

    protected function setSignature(): static
    {
        $data = $this->consId . '&' . $this->timestamp;
        $signature = hash_hmac('sha256', $data, $this->secretKey, true);
        $encodedSignature = base64_encode($signature);
        $this->signature = $encodedSignature;
        return $this;
    }

    protected function get($feature): string
    {
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';
        try {
            $response = $this->clients->request(
                'GET',
                $this->baseUrl . '/' . $this->serviceName . '/' . $feature,
                [
                    'headers' => $this->headers
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;
    }

    protected function post($feature, $data = [], $headers = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        if(!empty($headers)){
            $this->headers = array_merge($this->headers,$headers);
        }
        try {
            $response = $this->clients->request(
                'POST',
                $this->baseUrl . '/' . $this->serviceName . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;
    }

    protected function put($feature, $data = []): string
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'PUT',
                $this->baseUrl . '/' . $this->serviceName . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;
    }


    protected function delete($feature, $data = []): string
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'DELETE',
                $this->baseUrl . '/' . $this->serviceName . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;
    }
}
