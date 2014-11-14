<?php

namespace Pillar\Bates\Item\Image;

class Image
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var integer
     */
    protected $width;
    /**
     * @var integer
     */
    protected $height;

    /**
     * @param $url
     * @param $width
     * @param $height
     */
    public function __construct($url, $width, $height)
    {
        $this->url = (string) $url;
        $this->width = (int) $width;
        $this->height = (int) $height;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }
}
