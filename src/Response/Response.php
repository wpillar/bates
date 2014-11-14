<?php

namespace Pillar\Bates\Response;

use Pillar\Bates\Item\ItemCollection;
use Pillar\Bates\Item\ItemInterface;

class Response implements ResponseInterface
{
    /**
     * @var ItemCollection
     */
    protected $items;

    /**
     * @param ItemCollection $items
     */
    public function __construct(ItemCollection $items)
    {
        $this->items = $items;
    }

    /**
     * @return ItemCollection|ItemInterface
     */
    public function getResult()
    {
        return $this->items->count() === 1 ? $this->items->first() : $this->items;
    }
}