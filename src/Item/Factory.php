<?php

namespace Pillar\Bates\Item;

use Pillar\Bates\Item\Image\Image;
use Pillar\Bates\Item\Image\ImageSet;
use SimpleXMLElement;

class Factory implements FactoryInterface
{
    /**
     * @param SimpleXMLElement $xml
     * @return Item
     */
    public function build(SimpleXMLElement $xml)
    {
        $item = new Item();
        $item->setAsin((string) $xml->ASIN);
        $item->setTitle((string) $xml->ItemAttributes->Title);

        if (isset($xml->ImageSets)) {
            $imageSet = $xml->ImageSets->ImageSet;
            $item->setImages($this->buildImageSet($imageSet->children()));
        }

        return $item;
    }

    /**
     * @param SimpleXMLElement $xml
     * @return ItemCollection
     */
    public function buildCollection(SimpleXMLElement $xml)
    {
        $collection = new ItemCollection();

        foreach ($xml->Items->Item as $item) {
            $collection->addItem($this->build($item));
        }

        return $collection;
    }

    /**
     * @param SimpleXMLElement $xml
     * @return ImageSet
     */
    protected function buildImageSet(SimpleXMLElement $xml)
    {
        $imageNames = [
            'SwatchImage' => 'swatch',
            'SmallImage' => 'small',
            'ThumbnailImage' => 'thumbnail',
            'TinyImage' => 'tiny',
            'MediumImage' => 'medium',
            'LargeImage' => 'large'
        ];

        $imageSet = new ImageSet();

        foreach ($xml as $name => $image) {
            if (array_key_exists($name, $imageNames)) {
                $name = $imageNames[$name];
                $imageSet->addImage($name, new Image(
                    (string) $image->URL,
                    (int) $image->Width,
                    (int) $image->Height
                ));
            }
        }

        return $imageSet;
    }
}