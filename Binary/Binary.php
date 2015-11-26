<?php

/**
 * Class Binary
 * @author Antoine Lucsko
 * @level ***
 */
class Binary
{

    /**
     * @var int
     */
    private $rest = 0;

    /**
     * @var int
     */
    private $div = 0;

    /**
     * @var array
     */
    private $binary = [];

    /**
     * @var int
     */
    private $base = 2;

    /**
     * @return int
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param int $base
     */
    public function setBase($base)
    {
        $this->base = (int)$base;
    }

    /**
     * @param $number
     */
    private function fire($number)
    {
        $div = 0;
        while ($number > 1) {
            $div++;
            $number = $number - $this->base;
        }

        $this->rest = $number;
        $this->div = $div;
    }

    /**
     * @param $number decimal
     */
    public function decbin($number)
    {
        if (!is_int($number)) throw new InvalidArgumentException(sprintf('is not a number %s', $number));

        $this->fire($number);

        $this->binary[] = $this->rest;

        while ($this->div >= 1) {
            $this->fire($this->div);
            $this->binary[] = $this->rest;
        }

        $this->binary = $this->inverse($this->binary);

    }

    /**
     * @param array $binary
     * @return array
     */
    private function inverse(array $binary)
    {
        $res = [];
        while (!empty($binary)) $res[] = array_pop($binary);

        return $res;
    }

    public function __toString()
    {
        return (string)implode('', $this->binary);
    }

    public function reset()
    {
        $this->binary = [];
    }
}