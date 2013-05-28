<?php
namespace Bates\Locale;

class JP implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.co.jp/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.co.jp\n/onca/xml\n";
    }
}
