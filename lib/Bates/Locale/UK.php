<?php
namespace Bates\Locale;

class UK implements LocaleInterface
{
    const ENDPOINT = "http://webservices.amazon.co.uk/onca/xml";
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.co.uk\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
