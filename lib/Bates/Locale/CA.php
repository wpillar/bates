<?php
namespace Bates\Locale;

class CA implements LocaleInterface
{
    const ENDPOINT = 'http://webservices.amazon.ca/onca/xml';
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.ca\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
