<?php

declare(strict_types=1);

namespace HanzoAsashi\LaravelBpjsBridging\Aplicare;

use JsonException;

class KetersediaanKamar extends \HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging
{
    /**
     * @throws JsonException
     */
    public function refKelas()
    {
        $response = $this->get('ref/kelas');

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function bedGet($kodePpk, $start, $limit)
    {
        $response = $this->get('bed/read/'.$kodePpk.'/'.$start.'/'.$limit);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function bedCreate($kodePpk, $data = [])
    {
        $header = 'application/json';
        $response = $this->post('bed/create/'.$kodePpk, $data, $header);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function bedUpdate($kodePpk, $data = [])
    {
        $response = $this->put('bed/update/'.$kodePpk, $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function bedDelete($kodePpk, $data = [])
    {
        $response = $this->delete('bed/delete/'.$kodePpk, $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
