<?php
namespace PHPSci\Backend\Exceptions;

/**
 * ExtensionMissingException, thrown on when PHPSci extension is
 * missing.
 *
 * @category  PHPSci
 * @package   PHPSci\Backend\Exceptions
 * @author    Henrique Borba <henrique.borba.dev@gmail.com>
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link      http://phpsci.readthedocs.io
 */
class ExtensionMissingException extends \Exception implements  PHPSciException
{
}