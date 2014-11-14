<?php

namespace Pillar\Bates\Response;

use Pillar\Bates\Item\ItemCollection;

interface FactoryInterface
{
    /**
     * @param ItemCollection $items
     * @return ResponseInterface
     */
    public function build(ItemCollection $items);
}
