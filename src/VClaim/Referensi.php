<?php

namespace HanzoAsashi\LaravelBpjsBridging\VClaim;

use HanzoAsashi\LaravelBpjsBridging\LaravelBpjsBridging;
use JsonException;

class Referensi extends LaravelBpjsBridging
{
    /**
     * @throws JsonException
     */
    public function diagnosa($keyword)
    {
        $response = $this->get('referensi/diagnosa/'.$keyword);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function poli($keyword)
    {
        $response = $this->get('referensi/poli/'.$keyword);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function faskes($kdFaskes = null, $jnsFaskes = null)
    {
        $response = $this->get('referensi/faskes/'.$kdFaskes.'/'.$jnsFaskes);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function dokterDpjp($jnsPelayanan, $tglPelayanan, $spesialis)
    {
        $response = $this->get('referensi/dokter/pelayanan/'.$jnsPelayanan.'/tglPelayanan/'.$tglPelayanan.'/Spesialis/'.$spesialis);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function propinsi()
    {
        $response = $this->get('referensi/propinsi');

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function kabupaten($kdPropinsi)
    {
        $response = $this->get('referensi/kabupaten/propinsi/'.$kdPropinsi);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function kecamatan($kdKabupaten)
    {
        $response = $this->get('referensi/kecamatan/kabupaten/'.$kdKabupaten);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function procedure($keyword)
    {
        $response = $this->get('referensi/procedure/'.$keyword);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function kelasRawat()
    {
        $response = $this->get('referensi/kelasrawat');

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function dokter($keyword)
    {
        $response = $this->get('referensi/dokter/'.$keyword);

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function spesialistik()
    {
        $response = $this->get('referensi/spesialistik');

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function ruangrawat()
    {
        $response = $this->get('referensi/ruangrawat');

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function carakeluar()
    {
        $response = $this->get('referensi/carakeluar');

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function pascapulang()
    {
        $response = $this->get('referensi/pascapulang');

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
