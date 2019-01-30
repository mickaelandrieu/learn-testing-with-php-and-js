<?php

namespace Solvolabs;

use InvalidArgumentException;

/**
 * This class is used to realize some basic calculations.
 * For training purposes only, use bc_math functions instead.
 * @author Mickaël Andrieu <mickael.andrieu@solvolabs.com>
 */
class Calculator
{
    /**
     * @var float The result to display.
     */
    private $result;

    /**
     * Creates the Calculator.
     *
     * @param float $initialValue
     */
    public function __construct($initialValue = 0)
    {        
        $this->isNumber($initialValue);

        $this->result = $initialValue;
    }

    /**
     * @param float $number A number.
     */
    public function add($number)
    {
        $this->isNumber($number);
        $this->result = $this->result + $number;
    }

    /**
     * @param float $number A number.
     */
    public function minus($number)
    {
        $this->isNumber($number);
        $this->result = $this->result - $number;
    }

    /**
     * @param float $number A number.
     */
    public function multiply($number)
    {
        $this->isNumber($number);
        $this->result = $this->result * $number;
    }

    /**
     * @param float $number A number.
     */
    public function divideBy($number)
    {
        $this->isNumber($number);

        if ((double) $number === 0.0) {
            throw new InvalidArgumentException('Division by 0 is not allowed');
        }

        $this->result = $this->result / $number;
    }

    /**
     * If the object is returned, the result should be displayed.
     *
     * @return string
     */
    public function result()
    {
        return (string) $this->result;
    }

    /**
     * @return bool
     * 
     * @throws InvalidArgumentException
     */
    private function isNumber($value) {
        if (is_numeric($value)) {
            return true;
        }

        throw new InvalidArgumentException(
            sprintf(
                'Expect numeric value, got "%s" (%s)',
                gettype($value),
                (string) $value
            ), 1
        );
    }
}
