<?php

namespace Pillar\Bates\Item;

use Pillar\Bates\Item\Image\ImageSet;

interface ItemInterface
{
    /**
     * @return string
     */
    public function getAsin();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return ImageSet
     */
    public function getImages();
}
