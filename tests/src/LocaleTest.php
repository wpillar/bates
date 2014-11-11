<?php
namespace Bates\Locale;

use Mockery as m;

class LocaleTest extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        m::close();
    }

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
            $localeMock = m::mock(__NAMESPACE__."\\".$localeString);

            $localeFactory = m::mock('Factory', array($localeString));
            $localeFactory->shouldReceive('build')->once()->andReturn($localeMock);
            $locale = $localeFactory->build();

            $localeString = __NAMESPACE__."\\".$localeString;

            $this->assertTrue($locale instanceof $localeString);
        }
    }

    public function testEndPoint()
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
            $localeMock = m::mock(__NAMESPACE__."\\".$localeString);
            $localeMock->shouldReceive('getEndPoint')->once()->andReturn('string');

            $localeFactory = m::mock('Factory', array($localeString));
            $localeFactory->shouldReceive('build')->once()->andReturn($localeMock);
            $locale = $localeFactory->build();

            $this->assertTrue(is_string($locale->getEndPoint()));
        }
    }

    public function testGetRequestSignatureString()
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
            $localeMock = m::mock(__NAMESPACE__."\\".$localeString);
            $localeMock->shouldReceive('getRequestSignatureString')->once()->andReturn('string');

            $localeFactory = m::mock('Factory', array($localeString));
            $localeFactory->shouldReceive('build')->once()->andReturn($localeMock);
            $locale = $localeFactory->build();

            $this->assertTrue(is_string($locale->getRequestSignatureString()));
        }
    }
}
