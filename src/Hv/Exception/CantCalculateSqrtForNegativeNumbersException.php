<?php
class Hv_Exception_CantCalculateSqrtForNegativeNumbersException extends \Exception
{
    public function __construct()
    {
        $message = "Sqrt for negative number could not be calculated";
        parent::__construct($message);
    }
}