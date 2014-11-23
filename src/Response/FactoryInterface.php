<?php

namespace Pillar\Bates\Response;

use Pillar\Bates\Item\ItemCollection;
use Pillar\SimpleDom\Element;

interface FactoryInterface
{
    /**
     * @param ItemCollection $items
     * @param Element $xml
     * @return ResponseInterface
     */
    public function build(ItemCollection $items, Element $xml);
}
