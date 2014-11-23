<?php

namespace Pillar\Bates\Response;

use Pillar\Bates\Item\ItemCollection;
use Pillar\SimpleDom\Element;

class Factory implements FactoryInterface
{
    /**
     * @param ItemCollection $items
     * @param Element $xml
     * @return ResponseInterface
     */
    public function build(ItemCollection $items, Element $xml)
    {
        return new Response($items, $xml);
    }
}
