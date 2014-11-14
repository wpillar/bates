<?php

namespace Pillar\Bates\Locale;

class DE implements LocaleInterface
{
    /**
     * @return string
     */
    public function getEndPoint()
    {
        return "http://webservices.amazon.de/onca/xml";
    }

    /**
     * @return string
     */
    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.de\n/onca/xml\n";
    }
}
