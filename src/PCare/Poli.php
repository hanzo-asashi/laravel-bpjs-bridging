<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Poli extends PcareService
{
    protected string $feature = 'poli';

    public function fktp()
    {
        $this->feature .= '/fktp';

        return $this;
    }
}
