<?php

namespace Pillar\Bates\Item;

use Pillar\Bates\Item\Image\Image;
use Pillar\Bates\Item\Image\ImageSet;
use Pillar\SimpleDom\Element;

class Factory implements FactoryInterface
{
    /**
     * @param Element $xml
     * @return Item
     */
    public function build(Element $xml)
    {
        $class = $this->getItemClassName($xml);
        $item = new $class($xml);

        if ($xml->getElement('ImageSets')) {
            $imageSet = $xml->getElement('ImageSets')->getElement('ImageSet');
            $item->setImages($this->buildImageSet($imageSet));
        }

        return $item;
    }

    /**
     * @param Element $xml
     * @return ItemCollection
     */
    public function buildCollection(Element $xml)
    {
        $collection = new ItemCollection();

        foreach ($xml->getElements('Items') as $item) {
            $collection->addItem($this->build($item));
        }

        return $collection;
    }

    /**
     * @param Element $xml
     * @return ImageSet
     */
    protected function buildImageSet(Element $xml)
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
                    (string) $image->getValue('URL'),
                    (int) $image->getValue('Width'),
                    (int) $image->getValue('Height')
                ));
            }
        }

        return $imageSet;
    }

    /**
     * @param Element $xml
     * @return string
     */
    protected function getItemClassName(Element $xml)
    {
        $productGroup = (string) $xml->getElement('ItemAttributes')->getValue('ProductGroup');
        $productGroup = __NAMESPACE__ . '\\' . $productGroup;
        return class_exists($productGroup) ? $productGroup : Item::class;
    }
}
