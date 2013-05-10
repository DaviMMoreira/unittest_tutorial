<?php
namespace Hairy\Model
{
    class Fruit
    {
        /**
         * Counts the number of fruits in the database
         * @param string $fruit the fruit type we want to count
         */
        public function getNumberOfFruits($fruit)
        {
            $query = new DatabaseQuery();
            $query->setTable('fruit');
            $query->setLike('fruit.name', $fruit);
            $results = $query->getResults();
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
            $query = new DatabaseQuery();
            $query->setTable('fruit');
            $results = $query->getResults();

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
}