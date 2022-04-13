<?php

namespace HW7\Value;

use HW7\Enums\Code;

class Currency
{
    private Code $isoCode;


    public function __construct(Code $isoCode)
    {
        $this->setisoCode($isoCode);
    }

    public function getIsoCode(): Code
    {
        return $this->isoCode;
    }


    public function setIsoCode(Code $isoCode): void
    {
        $this->isoCode = $isoCode;
    }

}

$usd = new Currency(Code::USD);