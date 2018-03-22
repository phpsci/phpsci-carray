<?php
namespace PHPSci\Backend;
use PHPSci\Backend\Exceptions\ParameterValueException;
use PHPSci\PHPSci;

/**
 * Class Abstract CArray
 *
 * @category PHPSci
 * @package  PHPSci\Backend
 * @author   Henrique Borba <henrique.borba.dev@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://phpsci.readthedocs.io
 */
abstract class CArray implements \ArrayAccess
{
    use CArrayPrinter;

    /**
     * Main connection with backend array of doubles.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @var double * Backend C Array of Doubles
     */

    protected $c_array;


    /**
     * Save CArray object pointer using stdClass
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    protected function cArrayFromPointer(MemoryPointer $c) {
        $this->c_array = $c;
    }

    /**
     * Save CArray object pointer using stdClass
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    protected function cArrayFromStd(\stdClass $c) {
        $this->c_array = $c;
    }

    /**
     * Get CArray property
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @return float
     */
    public function getCArray() {
        return $this->c_array;
    }

    /**
     * Get CArray rows
     *
     * @return int
     */
    public function getRows() : int {
        return $this->c_array->rows;
    }

    /**
     * Set CArray from MemoryStack
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    private static function CArrayFromUUID(MemoryPointer $ptr) {
        \CPHPSci::fromUUID();
    }

    /**
     * Get how much time CArray took to be created
     *
     * @return float
     */
    public function getTook() : float {
        return $this->c_array->took;
    }

    /**
     * Get CArray rows
     *
     * @return int
     */
    public function getCols() : int {
        return $this->c_array->cols;
    }

    /**
     * Get CArray [rows, cols]
     *
     * @return CArray
     */
    public function getRowsCols() : CArray {
        return new PHPSci([$this->c_array->rows, $this->c_array->cols]);
    }

    /**
     * Generate C array of doubles
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param array $array
     * @return bool
     */
    public function generateCArray(array $array) : bool {
        $this->c_array = new MemoryPointer(new \CPHPSci($array));
        return true;
    }


    /**
     * Return current C array size in bytes, kilobytes, megabytes or gigabytes.
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param string|null $mode
     * @return float
     * @throws ParameterValueException
     */
    public function sizeOf(string $mode = null) : float {
        if(!isset($mode)) {
            return $this->c_array->c_array_size;
        }
        switch($mode) {
             case 'kb':
                 return $this->c_array->c_array_size/1024;
                 break;
             case 'mb':
                 return $this->c_array->c_array_size/2048;
                 break;
             case 'gb':
                 return $this->c_array->c_array_size/3072;
                 break;
             default:
                 throw new ParameterValueException("Expected parameter mode to be one of (null, 'kb', 'mb', 'gb'), '$mode' given");
        }
    }

    /**
     * Transform CArray in PHP regular array
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function toArray() {
        return \CPHPSci::toArray($this->c_array->uuid, $this->c_array->rows, $this->c_array->cols);
    }

    /**
     * Get CArray from MemoryStack using UUID
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function fromUuid() {

    }

    /**
     * Get UUID from CArray
     *
     * @return mixed
     */
    public function getUuid() {
        return $this->c_array->uuid;
    }


    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    /**
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param mixed $offset
     * @return bool
     */
    public function offsetUnset($offset) {
        return true;
    }

    /**
     * offsetGet
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     * @param mixed $offset
     * @return mixed|void
     */
    public function offsetGet($offset) {
        return $offset;
    }

    /**
     * Print CArray or Value
     *
     * @author Henrique Borba <henrique.borba.dev@gmail.com>
     */
    public function __toString()
    {
        # if CArray
        if(isset($this->c_array->dim)) {
            switch($this->c_array->dim) {
                case 1:
                    return $this->print1d();
                    break;
                case 2:
                    return $this->print2d();
                    break;
                default:
                    break;
            }
        }
        # if not CArray
        if($this->value != null) {
            return "".$this->value;
        }
    }
}