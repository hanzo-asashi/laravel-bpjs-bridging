<?php

namespace HanzoAsashi\LaravelBpjsBridging\VClaim;

use HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging;

class Peserta extends LaravelBpjsBridging
{
    public function getByNoKartu($noKartu, $tglPelayananSEP)
    {
        $response = $this->get('Peserta/nokartu/'.$noKartu.'/tglSEP/'.$tglPelayananSEP);

        return json_decode($response, true);
    }

    public function getByNIK($nik, $tglPelayananSEP)
    {
        $response = $this->get('Peserta/nik/'.$nik.'/tglSEP/'.$tglPelayananSEP);

        return json_decode($response, true);
    }
}
