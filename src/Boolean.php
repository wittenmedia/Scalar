<?php
/**
 * A class representing a boolean.
 */

namespace Scalar;

class Boolean
{
    /**
     * @property bool $value
     */
    private $value = false;
    
    /**
     * Creates a Boolean instance with a truthy value
     *
     * @param mixed $bool An accepted "truthy" value representing a boolean.
     *    Current accepted non-boolean values are 0, 1, "0", and "1"
     *
     * @throws \InvalidArgumentException if the value does not meet the above criteria
     */
    public function __construct($bool)
    {
        try {
            $this->value = $this->normalize($bool);
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }
    
    /**
     * Returns the value of the Boolean
     *
     * @return bool
     */
    public function getValue() : bool
    {
        return $this->value;
    }
    
    /**
     * Attempts to normalize a truthy value into a boolean
     *
     * @param mixed $bool An accepted "truthy" value representing a boolean.
     *    Current accepted non-boolean values are 0, 1, "0", and "1"
     *
     * @throws \InvalidArgumentException if the value does not meet the above criteria
     *
     * @return bool
     */
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
