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
        $this->xml = str_replace(array("\n", "\r", "\t"), '', $this->xml);

        $this->xml = trim(str_replace('"', "'", $this->xml));

        $simpleXml = simplexml_load_string($this->xml);

        $json = json_encode($simpleXml);

        return $json;
    }
}
