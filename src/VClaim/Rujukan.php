<?php

namespace HanzoAsashi\LaravelBpjsBridging\VClaim;

use HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging;
use JsonException;

class Rujukan extends LaravelBpjsBridging
{
    /**
     * @throws JsonException
     */
    public function insertRujukan($data = [])
    {
        $response = $this->post('Rujukan/insert', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function updateRujukan($data = [])
    {
        $response = $this->put('Rujukan/update', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function deleteRujukan($data = [])
    {
        $response = $this->delete('Rujukan/delete', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function cariByNoRujukan($searchBy, $keyword)
    {
        if ($searchBy === 'RS') {
            $url = 'Rujukan/RS/'.$keyword;
        } else {
            $url = 'Rujukan/'.$keyword;
        }
        $response = $this->get($url);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function cariByNoKartu($searchBy, $keyword, $multi = false)
    {
        $record = $multi ? 'List/' : '';
        if ($searchBy === 'RS') {
            $url = 'Rujukan/RS/Peserta/'.$keyword;
        } else {
            $url = 'Rujukan/'.$record.'Peserta/'.$keyword;
        }
        $response = $this->get($url);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function cariByTglRujukan($searchBy, $keyword)
    {
        if ($searchBy === 'RS') {
            $url = 'Rujukan/RS/TglRujukan/'.$keyword;
        } else {
            $url = 'Rujukan/List/Peserta/'.$keyword;
        }
        $response = $this->get($url);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
