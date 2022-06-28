<?php
namespace Models;

class Category {

    public  int $id;
    public  string $eventType;
  

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of eventType
     */ 
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * Set the value of eventType
     *
     * @return  self
     */ 
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;

        return $this;
    }
}

?>