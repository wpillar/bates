<?php

namespace Pillar\Bates\Locale;

class DE implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.de/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.de\n/onca/xml\n";
    }
}
