<?php
namespace Bates;

interface ResponseInterface
{
    public function get();

    public function setXml($xml);

    public function getObject();
}
