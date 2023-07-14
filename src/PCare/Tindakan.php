<?php

namespace HanzoAsashi\LaravelBpjsBridging\PCare;

class Tindakan extends PcareService
{
    protected string $feature = 'tindakan';

    public function kodeTkp($kodeTkp): static
    {
        $this->feature .= "/kdTkp/{$kodeTkp}";

        return $this;
    }

    public function kunjungan($nomorKunjungan): static
    {
        $this->feature .= "/kunjungan/{$nomorKunjungan}";

        return $this;
    }
}
