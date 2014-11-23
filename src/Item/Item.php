<?php

namespace Pillar\Bates\Item;

use Pillar\Bates\Item\Image\ImageSet;
use Pillar\SimpleDom\Element;

class Item implements ItemInterface
{
    protected $xml;
    protected $images;

    public function __construct(Element $xml)
    {
        $this->xml = $xml;
    }

    /**
     * @return string
     */
    public function getAsin()
    {
        return (string) $this->xml->getValue('ASIN');
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->xml->getElement('ItemAttributes')->getValue('Title');
    }

    /**
     * @param ImageSet $images
     */
    public function setImages(ImageSet $images)
    {
        $this->images = $images;
    }

    /**
     * @return ImageSet
     */
    public function getImages()
    {
        return $this->images;
    }
}
