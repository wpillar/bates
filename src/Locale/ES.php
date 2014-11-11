<?php

namespace Pillar\Bates\Locale;

class ES implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.es/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.es\n/onca/xml\n";
    }
}
