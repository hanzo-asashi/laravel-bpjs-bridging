<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Kunjungan extends PcareService
{
    /**
     * @var string
     */
    protected string $feature = 'kunjungan';

    public function rujukan($nomorKunjungan): static
    {
        $this->feature .= "/rujukan/{$nomorKunjungan}";

        return $this;
    }

    public function riwayat($nomorKartu): static
    {
        $this->feature .= "/peserta/{$nomorKartu}";

        return $this;
    }
}
