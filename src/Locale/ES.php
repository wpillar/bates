<?php

namespace Pillar\Bates\Locale;

class ES implements LocaleInterface
{
    /**
     * @return string
     */
    public function getEndPoint()
    {
        return "http://webservices.amazon.es/onca/xml";
    }

    /**
     * @return string
     */
    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.es\n/onca/xml\n";
    }
}
