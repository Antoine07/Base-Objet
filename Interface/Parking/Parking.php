<?php 

class Parking implements Countable
{

    private $storage;

    public function __construct()
    {
        $this->storage = new SplObjectStorage();
    }

    public function add(Parkable $vehicule)
    {
        if(!$this->storage->contains($vehicule))
        {
            $this->storage->attach($vehicule);
        }
    }

    public function remove(Parkable $vehicule)
    {
        if($this->storage->contains($vehicule))
        {
            $this->storage->detach($vehicule);
        }

    }

    public function count()
    {
        return $this->storage->count();
    }


    /**
     * @return SplObjectStorage
     */
    public function getStorage()
    {
        return $this->storage;
    }



}