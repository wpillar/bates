<?php
namespace Bates\Locale;

class US implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.com/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.com\n/onca/xml\n";
    }
}
