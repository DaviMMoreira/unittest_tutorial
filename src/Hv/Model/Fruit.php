<?php
class Hv_Model_Fruit
{
    /**
     * Counts the number of fruits in the database
     * Rewrite this method so you can write a test for it
     *
     * @param string $fruit the fruit type we want to count
     */
    public function getNumberOfFruits($fruit)
    {
        $db = new Hv_Lib_Dbadapter();
        $results = $db->getRows(
            'SELECT * FROM fruit WHERE name LIKE :fruit',
            array('fruit' => $fruit)
        );
        $count = count($results);
        return $count;
    }

    /**
     * Returns the number of fruits in a certain color
     * @param string $color the fruit color, for example "yellow" or "red"
     * @return int the number of fruits found in the database
     */
    public function getNumberOfFruitsByColor($color)
    {
        $db = new Hv_Lib_Dbadapter();
        $results = $db->getRows('SELECT * FROM fruit');

        $counter = 0;
        foreach($results as $fruitObject)
        {
            if ($this->_getFruitColor($fruitObject->getName()) === $color)
            {
                $counter++;
            }
        }
        return $counter;
    }

    /**
     * Returns the color of fruit in its normal state
     *
     * Write a test that calls this method directly without calling the
     * getNumberOfFruitsByColor() method.
     *
     * @param string $fruitname
     * @return string the typical color of the fruit
     */
    protected function _getFruitColor($fruitname)
    {
        switch($fruitname)
        {
            case 'banana':
                $color = 'blue';
                break;

            case 'apple':
                $color = 'red';
                break;

            case 'kiwi':
                $color = 'green';
                break;
        }
        return $color;
    }
}