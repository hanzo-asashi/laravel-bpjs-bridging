<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Poli extends PcareService
{
    /**
     * @var string
     */
    protected string $feature = 'poli';

    public function fktp(): static
    {
        $this->feature .= '/fktp';

        return $this;
    }
}
