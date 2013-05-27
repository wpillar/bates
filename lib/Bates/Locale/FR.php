<?php
namespace Bates\Locale;

class FR implements LocaleInterface
{
    const ENDPOINT = 'http://webservices.amazon.fr/onca/xml';
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.fr\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
