<?php

namespace Pillar\Bates\Locale;

interface LocaleInterface
{
    /**
     * @return string
     */
    public function getEndPoint();

    /**
     * @return string
     */
    public function getRequestSignatureString();
}
