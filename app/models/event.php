<?php
namespace Models;

use DateTime;

class Event {

    public  int $eventID;
    public  string $eventName;
    public  string $eventDate;
    public  float $price;
    public  string $description;
    public  string $image;
    public  int $categoryID;
    public Category $category;
 


    /**
     * Get the value of eventID
     */ 
    public function getEventID()
    {
        return $this->eventID;
    }

    /**
     * Set the value of eventID
     *
     * @return  self
     */ 
    public function setEventID($eventID)
    {
        $this->eventID = $eventID;

        return $this;
    }

    /**
     * Get the value of eventName
     */ 
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Set the value of eventName
     *
     * @return  self
     */ 
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;

        return $this;
    }

   

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of categoryID
     */ 
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * Set the value of categoryID
     *
     * @return  self
     */ 
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;

        return $this;
    }

    /**
     * Get the value of eventDate
     */ 
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set the value of eventDate
     *
     * @return  self
     */ 
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }
}

?>