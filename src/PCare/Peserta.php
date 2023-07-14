<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Peserta extends PcareService
{
    /**
     * @var string
     */
    protected string $feature = 'peserta';

    public function jenisKartu($jenisKartu): static
    {
        $this->feature .= "/{$jenisKartu}";

        return $this;
    }
}
