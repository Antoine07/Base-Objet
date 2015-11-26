<?php

class Letter
{

    private $letters = [];

    private $alphabet = [];

    private $time = 0;

    public function __construct($number = 16)
    {
        $this->generateAlphabet();
        $this->generateLetters($number);
    }

    public function generateLetters($number)
    {
        $start = microtime(true);

        shuffle($this->alphabet);

        foreach (range(1, $number) as $ind) {
            $this->letters[$ind] = $this->alphabet[rand(0, 25)];
        }

        $this->time = microtime(true) - $start;

    }

    public function generateAlphabet()
    {
        foreach (range(65, 90) as $in) $this->alphabet[] = chr($in);
    }

    public function getLetters()
    {
        return $this->letters;
    }

    public function getTime()
    {
        return $this->time;
    }

}