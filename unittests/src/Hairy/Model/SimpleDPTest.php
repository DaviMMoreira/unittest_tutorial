<?php
class SimpleDPTest extends PHPUnit_Framework_TestCase
{
    protected static $simpleObject;

    public static function setUpBeforeClass()
    {
        self::$simpleObject = new Hairy\Model\Simple();
    }

    /**
     * @dataProvider weirddataprovider
     */
    public function testWeirdCalculation($a, $b, $c, $expectedResult)
    {
        $this->assertEquals(
            $expectedResult,
            self::$simpleObject->weirdCalculation($a, $b, $c)
        );
    }

    /**
     * Data provider returning the expected results for the weirdcalculation method
     * @return array An array containing elements in the form ($a, $b, $c, $expectedResult)
     */
    public function weirddataprovider()
    {
        return array(
            array(2, 4, 6, 8),
            array(1, 2, 3, 2),
            array(1, 1, 1, 2),
            array(0, 0, 0, 0),
            array(-2, 10, -30, 18),
        );
    }
}