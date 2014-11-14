<?php

namespace Pillar\Bates\Item\Image;

class ImageSet
{
    /**
     * @var array
     */
    protected $images;

    /**
     * @param array $images
     */
    public function __construct(array $images = [])
    {
        foreach ($images as $name => $image) {
            $this->addImage($name, $image);
        }
    }

    /**
     * @param string $name
     * @param Image $image
     */
    public function addImage($name, Image $image)
    {
        $this->images[$name] = $image;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->images[$name];
    }
}