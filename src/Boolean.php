<?php
/**
 *
 */

namespace Scalar;

class Boolean
{
    private $value = false;
    
    public function __construct($bool = null)
    {
        if (isset($bool)) {
            try {
                $this->value = $this->normalize($bool);
            } catch (\InvalidArgumentException $e) {
                throw $e;
            }
        }
    }
    
    public function getValue() : bool
    {
        return $this->value;
    }
    
    private function normalize($bool) : bool
    {
        if (is_bool($bool)) {
            return $bool;
        } elseif (is_int($bool) && ($bool === 0 || $bool === 1)) {
            return (bool) $bool;
        } elseif (is_string($bool) && ($bool === '0' || $bool === '1')) {
            return (bool) $bool;
        }
        throw new \InvalidArgumentException('not a valid boolean');
    }
}
