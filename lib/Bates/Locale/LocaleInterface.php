<?php
namespace Bates\Locale;

interface LocaleInterface
{
    public function getEndPoint();

    public function getRequestSignatureString();
}
