<?php

namespace Pillar\Bates\Item;

use Pillar\Bates\Item\Image\ImageSet;
use SimpleXMLElement;

class Item implements ItemInterface
{
    protected $xml;
    protected $images;

    public function __construct(SimpleXMLElement $xml)
    {
        $this->xml = $xml;
    }

    /**
     * @return string
     */
    public function getAsin()
    {
        return (string) $this->xml->ASIN;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->xml->ItemAttributes->Title;
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
