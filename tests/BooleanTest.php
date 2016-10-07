<?php
/**
 *
 */

use Scalar\Boolean;

class BooleanTest extends PHPUnit_Framework_TestCase
{
    public function testBooleanDefault()
    {
        $boolean = new Boolean;
        $this->assertFalse($boolean->getValue());
    }
    
    /**
     * @dataProvider validBooleanProvider
     */
    public function testValidBoolean($valid, $expected)
    {
        $bool = new Boolean($valid);
        $this->assertSame($expected, $bool->getValue());
    }
    
    public function validBooleanProvider()
    {
        return array(
            array(true, true),
            array(false, false),
            array(1, true),
            array(0, false),
            array('1', true),
            array('0', false)
        );
    }
}
