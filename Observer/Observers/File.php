<?php namespace Observers;

use Pattern\Observer;
use Pattern\Subject;

class File implements Observer
{

    protected $splFile;

    public function __construct($splFile)
    {
        $this->splFile = $splFile;
    }

    public function updated(Subject $subject)
    {

        $this->splFile->fwrite($subject->get() . PHP_EOL);
    }
}