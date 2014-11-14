<?php

namespace Pillar\Bates\Locale;

class Factory
{
    /**
     * @param string $localeString
     * @return mixed
     */
    public function build($localeString)
    {
        $class = __NAMESPACE__.'\\'.$localeString;

        return new $class();
    }
}
