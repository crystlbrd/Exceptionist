<?php

namespace crystlbrd\Exceptionist\Tests\Units;

use crystlbrd\Exceptionist\Environment;
use crystlbrd\Exceptionist\ExceptionistTrait;
use crystlbrd\Exceptionist\Tests\ExceptionistTestCase;

class LoggingNoneTest extends ExceptionistTestCase
{
    use ExceptionistTrait;

    protected function setUp(): void
    {
        // set logging level to NONE
        $this->setReportingLevel(Environment::E_LEVEL_NONE);

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
        // do not except an info exception
        $this->throwInfoException();

        // test if code actually gets here
        $this->assertTrue(true);
    }

    public function testWarningMessage()
    {
        // do not except a warning exception
        $this->throwWarningException();

        // test if code actually gets here
        $this->assertTrue(true);
    }

    public function testErrorMessage()
    {
        // do not except an error exception
        $this->throwErrorException();

        // test if code actually gets here
        $this->assertTrue(true);
    }
}