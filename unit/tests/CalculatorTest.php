<?php

namespace Tests\Solvolabs;

use Solvolabs\Calculator;
use PHPunit\Framework\TestCase;

/**
 * PHPUnit tests for Calculator Class.
 *
 * @author Mickaël Andrieu <mickael.andrieu@solvolabs.com>
 */
class CalculatorTest extends TestCase
{
    public function testAddFunctionWorksAsExpected()
    {
        $calculator = new Calculator();
        $calculator->add(2);

        $this->assertSame(2, $calculator->result());
    }

    public function testMinusFunctionWorksAsExpected()
    {
        $calculator = new Calculator(4);
        $calculator->minus(2);

        $this->assertSame(2, $calculator->result());
    }
}
