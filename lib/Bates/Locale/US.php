<?php
namespace Bates\Locale;

class US implements LocaleInterface
{
    const ENDPOINT = 'http://webservices.amazon.com/onca/xml';
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.com\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
