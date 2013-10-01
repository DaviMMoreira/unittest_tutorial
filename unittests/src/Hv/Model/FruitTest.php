<?php
class FruitTest extends PHPUnit_Framework_TestCase
{
    public function testGetNumberOfFruits()
    {
        $this->markTestSkipped();
        
        $fruitModel = new Hv_Model_Fruit();
        $counter = $fruitModel->getNumberOfFruits('banana');
        $this->assertEquals(4, $counter, 'We expect 4 bananas');
    }
    
    public function testGetFruitColor()
    {
        $this->markTestSkipped();

        $method = new ReflectionMethod('Hv_Model_Fruit', '_getFruitColor');
        $method->setAccessible(true);
        $color = $method->invokeArgs(new Hv_Model_Fruit(), array('banana'));
        $this->assertEquals('yellow', $color, 'We expect bananas to be yellow');
    }
}