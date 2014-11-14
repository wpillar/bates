<?php

namespace Pillar\Bates\Locale;

class JP implements LocaleInterface
{
    /**
     * @return string
     */
    public function getEndPoint()
    {
        return "http://webservices.amazon.co.jp/onca/xml";
    }

    /**
     * @return string
     */
    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.co.jp\n/onca/xml\n";
    }
}
