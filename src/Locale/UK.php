<?php

namespace Pillar\Bates\Locale;

class UK implements LocaleInterface
{
    /**
     * @return string
     */
    public function getEndPoint()
    {
        return "http://webservices.amazon.co.uk/onca/xml";
    }

    /**
     * @return string
     */
    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.co.uk\n/onca/xml\n";
    }
}
