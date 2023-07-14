<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Kelompok extends PcareService
{
    /**
     * @var string
     */
    protected string $feature = 'kelompok';

    public function club($kodeJenisKelompok): static
    {
        $this->feature .= "/club/{$kodeJenisKelompok}";

        return $this;
    }

    public function kegiatan($parameter): static
    {
        // {bulan} for get or {edu id} for delete
        $this->feature .= "/kegiatan/{$parameter}";

        return $this;
    }

    public function peserta($eduId, $nomorKartu = null): static
    {
        $this->feature = "/peserta/{$eduId}";
        if ($nomorKartu !== null) {
            $this->feature .= "/{$nomorKartu}";
        }

        return $this;
    }
}
