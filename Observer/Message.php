<?php

use Pattern\Observer;

class Message implements Pattern\Subject
{

    private $observers;
    private $pdo;
    private $published_at;

    public function __construct(\PDO $pdo)
    {
        $this->observers = new \SplObjectStorage();

        $this->pdo = $pdo;
    }

    public function create($message)
    {

        $message = $this->pdo->quote($message);

        $this->published_at = date("Y-m-d H:i:s");

        $sql = sprintf("INSERT INTO messages (content, published_at) VALUES (%s, '%s');", $message, $this->published_at);

        $this->pdo->query($sql);

        $this->notify();
    }

    public function all()
    {
        $stmt = $this->pdo->query('SELECT * FROM messages');

        if (!$stmt) throw new \RuntimeException('no database');

        return $stmt->fetchAll();
    }

    /**
     * @param Observer $obs
     * @return $this
     */
    public function attach(Pattern\Observer $obs)
    {
        $this->observers->attach($obs);

        return $this;
    }

    /**
     * @param Observer $obs
     * @return $this
     */
    public function detach(Pattern\Observer $obs)
    {
        $this->observers->detach($obs);

        return $this;
    }

    public function get()
    {
        return $this->published_at;
    }


    public function notify()
    {
        foreach ($this->observers as $observer) $observer->updated($this);

    }
}