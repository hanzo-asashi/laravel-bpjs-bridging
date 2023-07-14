<?php

namespace HanzoAsashi\LaravelBpjsBridging\VClaim;

use HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging;
use JsonException;

class Monitoring extends LaravelBpjsBridging
{
    /**
     * @throws JsonException
     */
    public function dataKunjungan($tglSep, $jnsPelayanan)
    {
        $response = $this->get('Monitoring/Kunjungan/Tanggal/'.$tglSep.'/JnsPelayanan/'.$jnsPelayanan);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function dataKlaim($tglPulang, $jnsPelayanan, $statusKlaim)
    {
        $response = $this->get('Monitoring/Klaim/Tanggal/'.$tglPulang.'/JnsPelayanan/'.$jnsPelayanan.'/Status/'.$statusKlaim);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function historyPelayanan($noKartu, $tglAwal, $tglAkhir)
    {
        $response = $this->get('monitoring/HistoriPelayanan/NoKartu/'.$noKartu.'/tglAwal/'.$tglAwal.'/tglAkhir/'.$tglAkhir);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function dataKlaimJasaRaharja($tglMulai, $tglAkhir)
    {
        $response = $this->get('monitoring/JasaRaharja/tglMulai/'.$tglMulai.'/tglAkhir/'.$tglAkhir);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
