<?php

namespace crystlbrd\Exceptionist\Tests\Units;

use crystlbrd\Exceptionist\Environment;
use crystlbrd\Exceptionist\Tests\ExceptionistTestCase;

class InternalLogsTest extends ExceptionistTestCase
{
    protected function setUp(): void
    {
        /**
         * Set reporting level to none.
         * We just want to log them, not actually throw them
         */
        $this->setReportingLevel(Environment::E_LEVEL_NONE);

        // reset logs after every test
        $this->resetLogs();
    }

    public function testInternalLogging()
    {
        // throw all exceptions
        $this->throwAllExceptions();

        // Check, if all exceptions have been logged
        $this->assertEquals(4, count($this->getLogs(Environment::E_LEVEL_DEBUG)));

        // Now count down
        $this->assertEquals(3, count($this->getLogs(Environment::E_LEVEL_INFO)));
        $this->assertEquals(2, count($this->getLogs(Environment::E_LEVEL_WARNING)));
        $this->assertEquals(1, count($this->getLogs(Environment::E_LEVEL_ERROR)));
        $this->assertEquals(0, count($this->getLogs(Environment::E_LEVEL_NONE)));

        // Check the last one
        $this->assertEquals(Environment::E_LEVEL_ERROR, $this->getLastLog()['level']);
    }
}