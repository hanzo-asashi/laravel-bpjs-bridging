<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Mcu extends PcareService
{
    protected string $feature = 'mcu';

    public function kunjungan($nomorKunjungan): static
    {
        $this->feature .= "/kunjungan/{$nomorKunjungan}";

        return $this;
    }
}
