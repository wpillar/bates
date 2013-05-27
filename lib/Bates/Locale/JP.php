<?php
namespace Bates\Locale;

class JP implements LocaleInterface
{
    const ENDPOINT = 'http://webservices.amazon.co.jp/onca/xml';
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.co.jp\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
