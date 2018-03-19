<?php
namespace PHPSci\Backend;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * Class EmptyLogger
 *
 * @category PHPSci
 * @package  PHPSci\Backend
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://phpsci.readthedocs.io
 */
class Logger extends AbstractLogger implements LoggerInterface
{
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        return;
    }
}