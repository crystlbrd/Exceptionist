<?php

namespace crystlbrd\Exceptionist;

/**
 * Defines environment variables
 * @package crystlbrd\Exceptionist
 */
class Environment
{
    // Debug info
    const E_LEVEL_DEBUG = 0;

    // An info for the developer, but not an actual error
    const E_LEVEL_INFO = 1;

    // An error, but the program can actually go on
    const E_LEVEL_WARNING = 2;

    // An error breaking the script from going on
    const E_LEVEL_ERROR = 3;

    // Ignores any exceptions
    const E_LEVEL_NONE = 4;
}