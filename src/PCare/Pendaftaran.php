<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Pendaftaran extends PcareService
{
    /**
     * @var string
     */
    protected string $feature = 'pendaftaran';

    public function peserta($nomorKartu): static
    {
        $this->feature .= "/peserta/{$nomorKartu}";

        return $this;
    }

    public function tanggalDaftar($tanggalDaftar): static
    {
        $this->feature .= "/tglDaftar/{$tanggalDaftar}";

        return $this;
    }

    public function nomorUrut($nomorUrut): static
    {
        $this->feature .= "/noUrut/{$nomorUrut}";

        return $this;
    }

    public function kodePoli($kodePoli): static
    {
        $this->feature .= "/kdPoli/{$kodePoli}";

        return $this;
    }
}
