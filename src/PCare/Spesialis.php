<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Spesialis extends PcareService
{
    protected string $feature = 'spesialis';

    public function rujuk(): static
    {
        $this->feature .= '/rujuk';

        return $this;
    }

    public function subSpesialis($kodeSpesialis = null): static
    {
        $this->feature .= '/subspesialis';
        if ($kodeSpesialis !== null) {
            $this->feature .= "/{$kodeSpesialis}";
        }

        return $this;
    }

    public function sarana($kodeSarana = null): static
    {
        $this->feature .= '/sarana';
        if ($kodeSarana !== null) {
            $this->feature .= "/{$kodeSarana}";
        }

        return $this;
    }

    public function tanggalRujuk($tanggalRujuk): static
    {
        $this->feature .= "/tglEstRujuk/{$tanggalRujuk}";

        return $this;
    }

    public function khusus($kodeKhusus = null): static
    {
        $this->feature .= '/khusus';
        if ($kodeKhusus !== null) {
            $this->feature .= "/{$kodeKhusus}";
        }

        return $this;
    }

    public function nomorKartu($nomorKartu = null): static
    {
        $this->feature .= '/noKartu';
        if ($nomorKartu !== null) {
            $this->feature .= "/{$nomorKartu}";
        }

        return $this;
    }
}
