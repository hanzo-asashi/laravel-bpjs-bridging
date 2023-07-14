<?php

namespace AamDsam\Bpjs\PCare;

class Peserta extends PcareService
{
    /**
     * @var string
     */
    protected $feature = 'peserta';

    public function jenisKartu($jenisKartu)
    {
        $this->feature .= "/{$jenisKartu}";

        return $this;
    }
}
