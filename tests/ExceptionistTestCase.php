<?php

namespace crystlbrd\Exceptionist\Tests;

use crystlbrd\Exceptionist\Environment;
use crystlbrd\Exceptionist\ExceptionistTrait;
use Exception;
use PHPUnit\Framework\TestCase;

class ExceptionistTestCase extends TestCase
{
    use ExceptionistTrait;

    protected function throwAllExceptions()
    {
        $this->throwDebugException();
        $this->throwInfoException();
        $this->throwWarningException();
        $this->throwErrorException();
    }

    protected function throwDebugException()
    {
        $this->log(new Exception('debug'), Environment::E_LEVEL_DEBUG);
    }

    protected function throwInfoException()
    {
        $this->log(new Exception('info'), Environment::E_LEVEL_INFO);
    }

    protected function throwWarningException()
    {
        $this->log(new Exception('warning'), Environment::E_LEVEL_WARNING);
    }

    protected function throwErrorException()
    {
        $this->log(new Exception('error'), Environment::E_LEVEL_ERROR);
    }

    protected function setReportingLevel(int $level)
    {
        $this->ExceptionistReportingLevel = $level;
    }

    protected function resetLogs()
    {
        $this->ExceptionistLog = [];
    }

    protected function getLogs($level = Environment::E_LEVEL_DEBUG)
    {
        return $this->getExceptionistLogs($level);
    }

    public function getLastLog()
    {
        return $this->getLastExceptionistLog();
    }
}