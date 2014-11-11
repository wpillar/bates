<?php

namespace Pillar\Bates\Locale;

class CN implements LocaleInterface
{
    public function getEndPoint()
    {
        return "http://webservices.amazon.cn/onca/xml";
    }

    public function getRequestSignatureString()
    {
        return "GET\nwebservices.amazon.cn\n/onca/xml\n";
    }
}
