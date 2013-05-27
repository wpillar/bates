<?php
namespace Bates\Locale;

use Mockery as m;

class LocaleTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $localeStrings = array(
            'CA',
            'CN',
            'DE',
            'ES',
            'FR',
            'IT',
            'JP',
            'UK',
            'US',
        );

        foreach ($localeStrings as $localeString) {
            $localeFactory = new Factory($localeString);
            $locale = $localeFactory->build();

            $localeString = __NAMESPACE__."\\".$localeString;

            $this->assertTrue($locale instanceof $localeString);
        }
    }

    public function testGetEndPoint()
    {
        $localeStrings = array(
            'CA',
            'CN',
            'DE',
            'ES',
            'FR',
            'IT',
            'JP',
            'UK',
            'US',
        );

        foreach ($localeStrings as $localeString) {
            $localeFactory = new Factory($localeString);
            $locale = $localeFactory->build();

            $localeString = __NAMESPACE__."\\".$localeString;

            $this->assertTrue(is_string($locale->getEndPoint()));
        }
    }
}
