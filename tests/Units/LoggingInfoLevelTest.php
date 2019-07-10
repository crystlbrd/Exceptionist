<?php

namespace crystlbrd\Exceptionist\Tests\Units;

use crystlbrd\Exceptionist\Environment;
use crystlbrd\Exceptionist\ExceptionistTrait;
use crystlbrd\Exceptionist\Tests\ExceptionistTestCase;

class LoggingInfoLevelTest extends ExceptionistTestCase
{
    use ExceptionistTrait;

    protected function setUp(): void
    {
        // set logging level to INFO
        $this->setReportingLevel(Environment::E_LEVEL_INFO);

        // clear previous logs
        $this->resetLogs();
    }

    public function testDebugMessage()
    {
        // do not except a debug exception
        $this->throwDebugException();

        // test if code actually gets here
        $this->assertTrue(true);
    }

    public function testInfoMessage()
    {
        // except an info exception
        $this->expectExceptionMessage('info');
        $this->throwInfoException();
    }

    public function testWarningMessage()
    {
        // except a warning exception
        $this->expectExceptionMessage('warning');
        $this->throwWarningException();
    }

    public function testErrorMessage()
    {
        // except an error exception
        $this->expectExceptionMessage('error');
        $this->throwErrorException();
    }
}