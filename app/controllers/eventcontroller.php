<?php

namespace Controllers;

use Exception;
use Services\EventService;

class eventController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new EventService();
    }

    public function getAll()
    {
        $jwt = $this->checkToken();
        if (!$jwt) 
            return;        

        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $events = $this->service->getAll($offset, $limit);

        $this->respond($events);
    }

    public function getOne($id)
    {
        $jwt = $this->checkToken();
        if (!$jwt) 
            return;  

        $event = $this->service->getOne($id);

        //If the event is not found in the DB then returns 404
        if (!$event) {
            $this->respondWithError(404, "event not found");
            return;
        }

        $this->respond($event);
    }

    public function create()
    {
        $jwt = $this->checkToken();
        if (!$jwt) 
            return;  


        try {
            $event = $this->createObjectFromPostedJson("Models\\event");
            $event = $this->service->insert($event);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($event);
    }

    public function update($id)
    {

        $jwt = $this->checkToken();
        if (!$jwt) 
            return;  

        try {
            $event = $this->createObjectFromPostedJson("Models\\event");
            $event = $this->service->update($event, $id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($event);
    }

    public function delete($id)
    {
        $jwt = $this->checkToken();
        if (!$jwt) 
            return;  

        try {
            $this->service->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond(true);
    }
}
