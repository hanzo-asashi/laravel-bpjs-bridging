<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Mcu extends PcareService
{
    /**
     * @var string
     */
    protected string $feature = 'mcu';

    public function kunjungan($nomorKunjungan): static
    {
        $this->feature .= "/kunjungan/{$nomorKunjungan}";

        return $this;
    }
}
