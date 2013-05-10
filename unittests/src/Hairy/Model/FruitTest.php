<?php
class FruitTest extends PHPUnit_Framework_TestCase
{
    public function testGetNumberOfFruits()
    {
        $this->markTestSkipped();
        
        $fruitModel = new Hairy\Model\Fruit();
        $counter = $fruitModel->getNumberOfFruits('banana');
        $this->assertEquals(4, $counter, 'We expect 4 bananas');
    }
    
    public function testGetFruitColor()
    {
        $this->markTestSkipped();
        
        $method = new ReflectionMethod('Hairy\Model\Fruit', '_getFruitColor');
        $method->setAccessible(true);
        $color = $method->invokeArgs(new Hairy\Model\Fruit(), array('banana'));
        $this->assertEquals('yellow', $color, 'We expect bananas to be yellow');
    }
}