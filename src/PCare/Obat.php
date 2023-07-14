<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Obat extends PcareService
{
    protected string $feature = 'obat';

    public function dpho($keyword): static
    {
        $this->feature .= "/dpho/{$keyword}";

        return $this;
    }

    public function kunjungan($nomorKunjungan): static
    {
        $this->feature .= "/kunjungan/{$nomorKunjungan}";

        return $this;
    }
}
