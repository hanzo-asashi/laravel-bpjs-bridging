<?php

namespace HanzoAsashi\LaravelBpjsBridging\VClaim;

use HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging;
use JsonException;

class Sep extends LaravelBpjsBridging
{
    /**
     * @throws JsonException
     */
    public function insertSEP($data = [])
    {
        $response = $this->post('SEP/1.1/insert', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function updateSEP($data = [])
    {
        $response = $this->put('SEP/1.1/Update', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function deleteSEP($data = [])
    {
        $response = $this->delete('SEP/Delete', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function cariSEP($keyword)
    {
        $response = $this->get('SEP/'.$keyword);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function suplesiJasaRaharja($noKartu, $tglPelayanan)
    {
        $response = $this->get('sep/JasaRaharja/Suplesi/'.$noKartu.'/tglPelayanan/'.$tglPelayanan);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function pengajuanPenjaminanSep($data = [])
    {
        $response = $this->post('Sep/pengajuanSEP', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function approvalPenjaminanSep($data = [])
    {
        $response = $this->post('Sep/aprovalSEP', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function updateTglPlg($data = [])
    {
        $response = $this->put('Sep/updtglplg', $data);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function inacbgSEP($keyword)
    {
        $response = $this->get('sep/cbg/'.$keyword);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
