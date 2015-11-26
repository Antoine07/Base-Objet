<?php

class Calculator
{

    private $result = 0;

    private $operators = ['*', '+'];

    /**
     * @param $operator
     * @param array $numbers
     */
    public function run($operator, $numbers)
    {
        if (!in_array($operator, $this->operators)) die(sprintf('this operator is not supported, %s', $operator));

        if (!is_array($numbers)) die('is not array');

        if ($operator == '*') $this->mul($numbers);

        if ($operator == '+') $this->add($numbers);

    }

    /**
     * @param $numbers
     */
    private function add($numbers)
    {
        foreach ($numbers as $number) {
            $this->result += (int)$number;
        }
    }

    /**
     * @param $numbers
     */
    private function mul($numbers)
    {
        $this->result = 1;
        foreach ($numbers as $number) {

            $this->result *= (int) $number;
        }
    }

    public function reset()
    {
        $this->result = 0;
    }

    public function __toString()
    {
        return (string)$this->result;
    }

}