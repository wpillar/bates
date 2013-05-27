<?php
namespace Bates\Locale;

class DE implements LocaleInterface
{
    const ENDPOINT = 'http://webservices.amazon.de/onca/xml';
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.de\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
