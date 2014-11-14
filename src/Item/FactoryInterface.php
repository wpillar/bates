<?php

namespace Pillar\Bates\Item;

use SimpleXMLElement;

interface FactoryInterface
{
    /**
     * @param SimpleXMLElement $xml
     * @return Item
     */
    public function build(SimpleXMLElement $xml);

    /**
     * @param SimpleXMLElement $xml
     * @return ItemCollection
     */
    public function buildCollection(SimpleXMLElement $xml);
}