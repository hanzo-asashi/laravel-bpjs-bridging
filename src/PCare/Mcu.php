<?php

namespace AamDsam\Bpjs\PCare;

class Mcu extends PcareService
{
    /**
     * @var string
     */
    protected $feature = 'mcu';

    public function kunjungan($nomorKunjungan)
    {
        $this->feature .= "/kunjungan/{$nomorKunjungan}";

        return $this;
    }
}
