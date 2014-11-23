<?php

namespace Pillar\Bates\Response;

use Pillar\Bates\Item\ItemCollection;
use Pillar\Bates\Item\ItemInterface;

interface ResponseInterface
{
    /**
     * @return ItemCollection|ItemInterface
     */
    public function getResult();

    /**
     * @return string
     */
    public function getRawResponse();
}
