<?php

namespace crystlbrd\Exceptionist\Tests\Units;

use crystlbrd\Exceptionist\Environment;
use crystlbrd\Exceptionist\ExceptionistTrait;
use crystlbrd\Exceptionist\Tests\ExceptionistTestCase;

class LoggingDebugLevelTest extends ExceptionistTestCase
{
    use ExceptionistTrait;

    protected function setUp(): void
    {
        // set logging level to DEBUG
        $this->setReportingLevel(Environment::E_LEVEL_DEBUG);

        // clear previous logs
        $this->resetLogs();
    }

    public function testDebugMessage()
    {
        // except debug exception
        $this->expectExceptionMessage('debug');
        $this->throwDebugException();
    }

    public function testInfoMessage()
    {
        // except info exception
        $this->expectExceptionMessage('info');
        $this->throwInfoException();
    }

    public function testWarningMessage()
    {
        // except warning exception
        $this->expectExceptionMessage('warning');
        $this->throwWarningException();
    }

    public function testErrorMessage()
    {
        // except error exception
        $this->expectExceptionMessage('error');
        $this->throwErrorException();
    }
}