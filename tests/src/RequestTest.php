<?php
namespace Bates;

use \Mockery as m;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        m::close();
    }

    public function testRequest()
    {
        $localeInterface = m::mock('Bates\Locale\LocaleInterface');
        $responseInterface = m::mock('Bates\ResponseInterface');

        $this->assertTrue($localeInterface instanceof Locale\LocaleInterface);
        $this->assertTrue($responseInterface instanceof ResponseInterface);
    }
}
