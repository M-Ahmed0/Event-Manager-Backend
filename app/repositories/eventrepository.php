<?php

namespace Repositories;

use Models\Category;
use Models\Event;
use PDO;
use PDOException;
use Repositories\Repository;

class EventRepository extends Repository
{
    function getAll($offset = NULL, $limit = NULL)
    {
        try {
            $query = "SELECT `event`.*, category.eventType as category_eventType FROM `event` INNER JOIN category ON `event`.categoryID = category.id";
            if (isset($limit) && isset($offset)) {
                $query .= " LIMIT :limit OFFSET :offset ";
            }
            $stmt = $this->connection->prepare($query);
            if (isset($limit) && isset($offset)) {
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            }
            $stmt->execute();

            $events = array();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {               
                $events[] = $this->rowToEvent($row);
            }

            return $events;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $query = "SELECT `event`.*, category.eventType as category_eventType FROM `event` INNER JOIN category ON `event`.categoryID = category.id WHERE `event`.eventID = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $event = $this->rowToEvent($row);

            return $event;
        } catch (PDOException $e) {
            echo $e;
        }
    }

  
 

    function rowToEvent($row) {
        $event = new Event();
        $event->eventID = $row['eventID'];
        $event->eventName = $row['eventName'];
        $newDate = date("d-m-Y", strtotime($row['eventDate'])); 
        $event->eventDate = $newDate ;
        $event->price = $row['price'];
        $event->description = $row['description'];
        $event->image = $row['image'];
        $event->categoryID = $row['categoryID'];
        $category = new Category();
        $category->id = $row['categoryID'];
        $category->eventType = $row['category_eventType'];

        $event->category = $category;
        return $event;
    }
    

    function insert($event)
    {
        try {
            $stmt = $this->connection->prepare("INSERT into `event` (eventName, eventDate ,price, description, image, categoryID) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$event->eventName , $event->eventDate , $event->price , $event->description , $event->image , $event->categoryID]);

            $event->eventID = $this->connection->lastInsertId();

            return $this->getOne($event->eventID);
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function update($event, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `event` SET eventName = ?, eventdate = ?, price = ?, description = ?, image = ?, categoryID = ? WHERE eventID = ?");

            $stmt->execute([$event->eventName,  $event->eventDate, $event->price, $event->description, $event->image, $event->categoryID, $id]);

            $event->eventID = $id;

            return $this->getOne($event->eventID);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function delete($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `event` WHERE eventID = :eventID");
            $stmt->bindParam(':eventID', $id);
            $stmt->execute();
            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
}
