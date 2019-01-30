<?php

namespace Tests\Solvolabs;

use Solvolabs\Calculator;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * PHPUnit tests for Calculator Class.
 *
 * @author Mickaël Andrieu <mickael.andrieu@solvolabs.com>
 */
class CalculatorTest extends TestCase
{
    public function testResult()
    {
        $calculator = new Calculator();

        $this->assertInternalType('string', $calculator->result());
    }

    /**
     * @depends testResult
     */
    public function testAddFunctionWorksAsExpected()
    {
        $calculator = new Calculator();
        $calculator->add(2);

        $this->assertSame('2', $calculator->result());
    }

    /**
     * @depends testResult
     */
    public function testMinusFunctionWorksAsExpected()
    {
        $calculator = new Calculator(4);
        $calculator->minus(2);

        $this->assertSame('2', $calculator->result());
    }

    /**
     * @depends testResult
     */
    public function testMultiplyFunctionWorkAsExpected() {
        $calculator = new Calculator(2);
        $calculator->multiply(4);

        $this->assertSame('8', $calculator->result());
    }

    /**
     * @depends testResult
     */
    public function testMultiplyNegativeFunctionWorkAsExpected() {
        $calculator = new Calculator(2);
        $calculator->multiply('-1');

        $this->assertSame('-2', $calculator->result());
    }

    public function testMultiplyWithBoolValueThrowsAnException() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Expect numeric value, got "boolean" (1)');
        $calculator = new Calculator(2);
        $calculator->multiply(true);
    }

    public function testDivideByZeroShouldThrowAnException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Division by 0 is not allowed');

        $calculator = new Calculator(10);
        $calculator->divideBy(0);
    }

    public function testMultiplyWithReallyBigValues()
    {
        $calculator = new Calculator(PHP_INT_MAX);

        $calculator->multiply(PHP_INT_MAX);

        $result = (string) (PHP_INT_MAX * PHP_INT_MAX);

        $this->assertSame($result, $calculator->result());
    }
}
