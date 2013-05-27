<?php
namespace Bates\Locale;

class ES implements LocaleInterface
{
    const ENDPOINT = 'http://webservices.amazon.es/onca/xml';
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.es\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
