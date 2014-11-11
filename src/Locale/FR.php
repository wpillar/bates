<?php

namespace Pillar\Bates\Locale;

class FR implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.fr/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.fr\n/onca/xml\n";
    }
}
