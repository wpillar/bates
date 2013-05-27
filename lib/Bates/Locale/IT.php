<?php
namespace Bates\Locale;

class IT implements LocaleInterface
{
    const ENDPOINT = 'http://webservices.amazon.it/onca/xml';
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.it\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
