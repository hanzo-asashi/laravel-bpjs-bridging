<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class StatusPulang extends PcareService
{
    protected string $feature = 'statuspulang';

    public function rawatInap($status = true): static
    {
        $this->feature .= "/rawatInap/{$status}";

        return $this;
    }
}
