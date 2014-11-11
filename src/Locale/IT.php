<?php

namespace Pillar\Bates\Locale;

class IT implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.it/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.it\n/onca/xml\n";
    }
}
