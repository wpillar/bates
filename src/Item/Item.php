<?php

namespace Pillar\Bates\Item;

use Pillar\Bates\Item\Image\ImageSet;

class Item implements ItemInterface
{
    /**
     * @var string
     */
    protected $asin;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var ImageSet
     */
    protected $images;

    /**
     * @return string
     */
    public function getAsin()
    {
        return $this->asin;
    }

    /**
     * @param string $asin
     */
    public function setAsin($asin)
    {
        $this->asin = (string) $asin;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = (string) $title;
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
