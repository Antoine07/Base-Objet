<?php

/**
 * Class Calculator
 * @author Antoine Lucsko
 * @level ***
 */
class Calculator
{

    /**
     * @var int
     */
    private $result = 0;

    /**
     * @var null
     */
    private $symbol = ['+' => 'add', '*' => 'mul', '-' => 'sub'];


    public function __toString()
    {
        return " result: {$this->result}";
    }

    /**
     * @param $symbol
     * @param ...$numbers
     */
    public function run($symbol, ...$numbers)
    {
        $this->calculate($numbers, $symbol);
    }

    /**
     * reset method clean result
     */
    public function reset()
    {
        $this->result = 0;
    }

    /**
     * @param $numbers
     * @param $symbol
     */
    private function calculate($numbers, $symbol)
    {
        if (!array_key_exists($symbol, $this->symbol))
            throw new InvalidArgumentException(sprintf('invalid symbol: %s ', $symbol));

        $symbol = $this->symbol[$symbol];

        foreach ($numbers as $number) {
            $this->$symbol($number);
        }
    }

    private function isNumeric($number)
    {
        if (!is_integer($number)) throw new InvalidArgumentException(sprintf('invalid number %s', $number));

        return;
    }

    private function add($number)
    {
        $this->isNumeric($number);

        $this->result += $number;
    }

    private function sub($number)
    {
        $this->isNumeric($number);

        $this->result += $number;
    }

    private function mul($number)
    {
        $this->isNumeric($number);

        $this->result == 0 ? $this->result = 1 : $this->result;
        
        $this->result *= $number;
    }

}