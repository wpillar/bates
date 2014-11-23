<?php

namespace Pillar\Bates\Item;

use Pillar\SimpleDom\Element;

interface FactoryInterface
{
    /**
     * @param Element $xml
     * @return Item
     */
    public function build(Element $xml);

    /**
     * @param Element $xml
     * @return ItemCollection
     */
    public function buildCollection(Element $xml);
}
