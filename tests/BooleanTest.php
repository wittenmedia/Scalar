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
            array(null, false),
            array(true, true),
            array(false, false),
            array(1, true),
            array(0, false),
            array('1', true),
            array('0', false)
        );
    }
    
    /**
     * @dataProvider invalidBooleanProvider
     * @expectedException InvalidArgumentException
     */
    public function testInvalidBoolean($invalid)
    {
        $bool = new Boolean($invalid);
    }
    public function invalidBooleanProvider()
    {
        return array(
            array('true'),
            array('false'),
            array(array(true)),
            array('string'),
            array(new stdClass),
            array(-1),
            array(0.0),
            array(123)
        );
    }
}
