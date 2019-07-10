<?php

namespace crystlbrd\Exceptionist;

use Exception;

/**
 * Provides exception logging mechanisms
 * @package crystlbrd\Exceptionist
 */
trait ExceptionistTrait
{
    /**
     * @var array saves exceptions internally
     */
    private $ExceptionistLog = [];

    /**
     * @var int level of exception reporting
     */
    private $ExceptionistReportingLevel = Environment::E_LEVEL_ERROR;

    /**
     * Logs an exception and throws it, if its level is high enough
     * @param Exception $exception
     * @param int $level level of exception
     * @throws Exception
     */
    private function log(Exception $exception, int $level = Environment::E_LEVEL_DEBUG): void
    {
        // Get trace info of previous function
        $trace = debug_backtrace();
        $debugInfo = $trace[1];

        // Always log the exception
        $this->ExceptionistLog[] = array_merge($debugInfo, [
            'level' => $level,
            'exception' => $exception
        ]);

        // throw exception, if its level is high enough
        if ($level >= $this->ExceptionistReportingLevel) {
            throw $exception;
        }
    }

    /**
     * Gets all internally saved logs higher or equal than the given level
     * @param int $level
     * @return array
     */
    private function getLogs(int $level = Environment::E_LEVEL_DEBUG): array
    {
        $result = [];
        foreach ($this->ExceptionistLog as $log) {
            if ($log['level'] >= $level) {
                $result[] = $log;
            }
        }

        return $result;
    }

    /**
     * Gets the last logged exception
     * @return array
     */
    private function getLastLog(): array
    {
        return $this->ExceptionistLog[(count($this->ExceptionistLog) - 1)];
    }
}