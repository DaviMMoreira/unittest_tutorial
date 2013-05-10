<?php
namespace Hairy\Exception
{
    class CantCalculateSqrtForNegativeNumbersException extends \Exception
    {
        public function __construct()
        {
            $message = "Sqrt for negative number could not be calculated";
            parent::__construct($message);
        }
    }
}