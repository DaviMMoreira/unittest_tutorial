<?php
namespace Hairy\Model
{
    class Simple
    {
        /**
         * Our total counter for the addUp method
         * @var int
         */
        protected $total = 0;

        /**
         * Write two tests that test this method; one for positive numbers, one
         * for negative numbers.
         *
         * @param int $input a number
         * @return int the input number multiplied by 2
         */
        public function double($input)
        {
            return $input * 2;
        }

        /**
         * Keeps adding numbers and keeps returning the result. Write two tests
         * to test two separate sequences, using the setUp and tearDown methods.
         * 
         * @param int $number a number we use as input
         * @return int the numbers we received so far added up
         */
        public function addUp($number)
        {
            $this->total += $number;
            return $this->total;
        }

        /**
         * Returns a new mailer instance. Write a test that checks the type of
         * object this method returns.
         *
         * @return \Hairy\Lib\Mailer our mailer
         */
        public function getNewMailerInstance()
        {
            $mailer = new \Hairy\Lib\Mailer();
            return $mailer;
        }

        /**
         * Returns the square root for the input. Test if the method throws an
         * exception when the input is negative.
         *
         * @param int $input the input to calculate the square root for
         * @return float
         * @throws Exception when input < 0
         */
        public function getSquareRoot($input)
        {
            if ($input < 0)
            {
                throw new \Hairy\Exception\CantCalculateSqrtForNegativeNumbersException();
            }

            $result = sqrt($input);
            return $result;
        }
    }
}