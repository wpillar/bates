<?php

namespace Pillar\Bates;

class ObjectResponse implements ResponseInterface
{
    public $xml;

    public function setXml($xml)
    {
        $this->xml = $xml;
    }

    public function get()
    {
        return $this->parseXml();
    }

    public function getObject()
    {
        return $this->parseXml();
    }

    private function parseXml()
    {
        $this->xml = str_replace(array("\n", "\r", "\t"), '', $this->xml);

        $this->xml = trim(str_replace('"', "'", $this->xml));

        $simpleXml = simplexml_load_string($this->xml);

        return $simpleXml;
    }
}
