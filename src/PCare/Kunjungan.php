<?php

namespace AamDsam\Bpjs\PCare;

class Kunjungan extends PcareService
{
    /**
     * @var string
     */
    protected $feature = 'kunjungan';

    public function rujukan($nomorKunjungan)
    {
        $this->feature .= "/rujukan/{$nomorKunjungan}";

        return $this;
    }

    public function riwayat($nomorKartu)
    {
        $this->feature .= "/peserta/{$nomorKartu}";

        return $this;
    }
}
