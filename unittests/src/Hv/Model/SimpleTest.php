<?php
class SimpleTest extends PHPUnit_Framework_TestCase
{
    public function testDouble()
    {
        $simpleObject = new Hv_Model_Simple();
        $result = $simpleObject->double(2);
        $this->assertEquals(4, $result, 'The double value of 2 should be 4');

        $negativeResult = $simpleObject->double(-2);
        $this->assertEquals(-4, $negativeResult, 'The double value of -2 should be -4');
    }

    public function testGetMailerInstance()
    {
        $simpleObject = new Hv_Model_Simple();
        $mailer = $simpleObject->getNewMailerInstance();
        $this->assertThat(
            $mailer,
            $this->isInstanceOf('Hv_Lib_Mailer'),
            'The method should return a Hv_Lib_Mailer instance'
        );
    }

    public function testCompareArrays()
    {
        $simpleObject = new Hv_Model_Simple();
        $result = $simpleObject->getSomeResultAsArray();
        $this->assertEquals(array(1,2,4,8,16), $result);
    }

    public function testSqrtException()
    {
        $simpleObject = new Hv_Model_Simple();
        $result = $simpleObject->getSquareRoot(9);
        $this->assertEquals(3, $result, "Back where I'm from the square root of 9 is 3");

        $this->setExpectedException('Hv_Exception_CantCalculateSqrtForNegativeNumbersException');
        $simpleObject->getSquareRoot(-9);
    }
}