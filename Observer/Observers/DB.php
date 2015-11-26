<?php namespace Observers;

use Pattern\Observer;
use Pattern\Subject;

class DB implements Observer
{

    private $pdo;
    private $table;

    public function __construct(\PDO $pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function updated(Subject $subject)
    {

        $sql = sprintf("INSERT INTO {$this->table} (published_at) VALUES ('%s')", $subject->get());

        $this->pdo->query($sql);
    }

}