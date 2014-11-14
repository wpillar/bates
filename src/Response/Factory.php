<?php

namespace Pillar\Bates\Response;

use Pillar\Bates\Item\ItemCollection;

class Factory implements FactoryInterface
{
    /**
     * @param ItemCollection $items
     * @return ResponseInterface
     */
    public function build(ItemCollection $items)
    {
        return new Response($items);
    }
}