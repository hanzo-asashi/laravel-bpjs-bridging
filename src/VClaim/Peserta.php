<?php

namespace HanzoAsashi\LaravelBpjsBridging\VClaim;

use HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging;
use JsonException;

class Peserta extends LaravelBpjsBridging
{
    /**
     * @throws JsonException
     */
    public function getByNoKartu($noKartu, $tglPelayananSEP)
    {
        $response = $this->get('Peserta/nokartu/'.$noKartu.'/tglSEP/'.$tglPelayananSEP);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function getByNIK($nik, $tglPelayananSEP)
    {
        $response = $this->get('Peserta/nik/'.$nik.'/tglSEP/'.$tglPelayananSEP);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
