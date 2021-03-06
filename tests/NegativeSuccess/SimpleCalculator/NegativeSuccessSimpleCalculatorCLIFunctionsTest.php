<?php


namespace PositiveSuccess\SimpleCalculator;


use App\Models\User;
use App\Modules\SimpleCalculator\SimpleCalculatorCLI;
use App\Modules\SimpleCalculator\SimpleCalculatorCLIFuntions;
use PHPUnit\Framework\TestCase;

class PositiveSuccessSimpleCalculatorCLIFunctionsTest extends TestCase
{
    private $SimpleCalculatorCLIFuntions;

    protected function setUp(): void
    {
        $this->SimpleCalculatorCLIFuntions = new SimpleCalculatorCLIFuntions();
        $this->SimpleCalculatorCLIFuntions->setIntFirstValue(13);
        $this->SimpleCalculatorCLIFuntions->setSignForCalculateValues("+");
        $this->SimpleCalculatorCLIFuntions->setIntSecondValue(23);
    }
    protected function tearDown(): void
    {

    }

    public function testFunctionCheckValuesWithSameAssert() {
        $this->assertNotSame(36, $this->SimpleCalculatorCLIFuntions->checkValues());
    }


    public function simpleCalculatorProvider(){
        return [
            'one' => [15, "-", 12, 23],
            'two' => [13, "+", 12, 235],
            'three' => [13, "-", 12, 41],
        ];
    }

    /**
     * @dataProvider simpleCalculatorProvider
     * @param $providersFirstValue
     * @param $ProvidersSign
     * @param $ProvidersSecondValue
     * @param $ProvidersResultValue
     */
    public function testFunctionCheckValuesWithDataProviderSameAssert($providersFirstValue,
                                                                      $ProvidersSign,
                                                                      $ProvidersSecondValue,
                                                                      $ProvidersResultValue) {

        $this->SimpleCalculatorCLIFuntions->setIntFirstValue($providersFirstValue);
        $this->SimpleCalculatorCLIFuntions->setSignForCalculateValues($ProvidersSign);
        $this->SimpleCalculatorCLIFuntions->setIntSecondValue($ProvidersSecondValue);
        $this->assertNotSame("$ProvidersResultValue", $this->SimpleCalculatorCLIFuntions->checkValues());
    }


}