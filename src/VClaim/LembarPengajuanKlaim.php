<?php

namespace HanzoAsashi\LaravelBpjsBridging\VClaim;

use HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging;

class LembarPengajuanKlaim extends LaravelBpjsBridging
{
    public function insertLPK($data = [])
    {
        $response = $this->post('LPK/insert', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    public function updateLPK($data = [])
    {
        $response = $this->put('LPK/update', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    public function deleteLPK($data = [])
    {
        $response = $this->delete('LPK/delete', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    public function cariLPK($tglMasuk, $jnsPelayanan)
    {
        $response = $this->get('LPK/TglMasuk/'.$tglMasuk.'/JnsPelayanan/'.$jnsPelayanan);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
