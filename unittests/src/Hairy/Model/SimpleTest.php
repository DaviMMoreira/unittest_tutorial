<?php
class SimpleTest extends PHPUnit_Framework_TestCase
{
    public function testDouble()
    {
        $simpleObject = new Hairy\Model\Simple();
        $result = $simpleObject->double(2);
        $this->assertEquals(4, $result, 'The double value of 2 should be 4');

        $negativeResult = $simpleObject->double(-2);
        $this->assertEquals(-4, $negativeResult, 'The double value of -2 should be -4');
    }

    public function testGetMailerInstance()
    {
        $simpleObject = new Hairy\Model\Simple();
        $mailer = $simpleObject->getNewMailerInstance();
        $this->assertThat(
            $mailer,
            $this->isInstanceOf('Hairy\Lib\Mailer'),
            'The method should return a Hairy\Lib\Mailer instance'
        );
    }
}