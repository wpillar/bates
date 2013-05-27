<?php
namespace Bates\Locale;

class Factory
{
    private $localeString;

    public function __construct($localeString)
    {
        $this->localeString = $localeString;
    }

    public function build()
    {
        $class = __NAMESPACE__.'\\'.$this->localeString;

        return new $class();
    }
}
