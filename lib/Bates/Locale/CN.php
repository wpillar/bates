<?php
namespace Bates\Locale;

class CN implements LocaleInterface
{
    const ENDPOINT = 'http://webservices.amazon.cn/onca/xml';
    const REQUEST_SIGNATURE = "GET\nwebservices.amazon.cn\n/onca/xml\n";

    public function getEndPoint()
    {
        return self::ENDPOINT;
    }

    public function getRequestSignatureString()
    {
        return self::REQUEST_SIGNATURE;
    }
}
