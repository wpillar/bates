<?php

namespace Pillar\Bates\Item;

use Traversable;

class ItemCollection implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * @param ItemInterface $item
     */
    public function addItem(ItemInterface $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @return ItemInterface
     */
    public function first()
    {
        return reset($this->items);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}
