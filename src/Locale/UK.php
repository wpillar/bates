<?php

namespace Pillar\Bates\Locale;

class UK implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.co.uk/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.co.uk\n/onca/xml\n";
    }
}
