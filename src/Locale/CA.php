<?php

namespace Pillar\Bates\Locale;

class CA implements LocaleInterface
{
    /**
     * @return string
     */
    public function getEndPoint()
    {
        return "http://webservices.amazon.ca/onca/xml";
    }

    /**
     * @return string
     */
    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.ca\n/onca/xml\n";
    }
}
