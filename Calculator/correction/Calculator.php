<?php 
class Calculator {

    private $res = 0;

    private $symbols=['+' ,'*' ];

    public function run($symbol, array $numbers)
    {
        if(!in_array($symbol, $this->symbols))
            die(sprintf('ce symbole est inconu %s', $symbol));

        if($symbol=='+') $this->add($numbers);

        if($symbol == '*') $this->mul($numbers);

    }

    public function add($numbers)
    {
        foreach($numbers as $number) $this->res+=$number;
    }

    public function mul($numbers)
    {
        $this->res = ($this->res==0)? 1 : $this->res;
        foreach($numbers as $number) $this->res*=$number;
    }

    public function reset()
    {
        $this->res = 0;
    }

    public function __toString()
    {
        // return "resultat: {$this->res}";
        return (string) $this->res;
    }

}