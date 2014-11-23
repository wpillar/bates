<?php

namespace Pillar\Bates\Response;

use Pillar\Bates\Item\ItemCollection;
use Pillar\Bates\Item\ItemInterface;
use Pillar\SimpleDom\Element;

class Response implements ResponseInterface
{
    /**
     * @var ItemCollection
     */
    protected $items;

    /**
     * @var Element
     */
    protected $xml;

    /**
     * @param ItemCollection $items
     * @param Element $xml
     */
    public function __construct(ItemCollection $items, Element $xml)
    {
        $this->items = $items;
        $this->xml = $xml;
    }

    /**
     * @return ItemCollection|ItemInterface
     */
    public function getResult()
    {
        return $this->items->count() === 1 ? $this->items->first() : $this->items;
    }

    /**
     * @return string
     */
    public function getRawResponse()
    {
        return $this->xml->asXml();
    }
}
