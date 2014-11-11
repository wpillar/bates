<?php
namespace Bates;

class JsonResponse implements ResponseInterface
{
    public $xml;

    public function setXml($xml)
    {
        $this->xml = $xml;
    }

    public function get()
    {
        $obj = $this->parseXml();

        $json = json_encode($obj);

        return $json;
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
