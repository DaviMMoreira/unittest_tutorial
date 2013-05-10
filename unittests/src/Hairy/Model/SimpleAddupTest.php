<?php
class SimpleAddupTest extends PHPUnit_Framework_TestCase
{
    protected $ourModel;

    public function setUp()
    {
        $this->ourModel = new Hairy\Model\Simple();
    }

    public function tearDown()
    {
        unset($this->ourModel);
    }

    public function testAddUp_testOne()
    {
        $model = $this->ourModel;

        $result = $model->addUp(2);
        $this->assertEquals(2, $result);

        $result = $model->addUp(2);
        $this->assertEquals(4, $result);

        $result = $model->addUp(10);
        $this->assertEquals(14, $result);
    }

    public function testAddUp_testTwo()
    {
        $model = $this->ourModel;

        $result = $model->addUp(-2);
        $this->assertEquals(-2, $result);

        $result = $model->addUp(2);
        $this->assertEquals(0, $result);

        $result = $model->addUp(10);
        $this->assertEquals(10, $result);
    }
}