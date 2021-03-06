<?php
namespace Bates\Locale;

class CA implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.ca/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.ca\n/onca/xml\n";
    }
}
