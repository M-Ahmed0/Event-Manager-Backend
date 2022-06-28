<?php
namespace Services;

use Repositories\EventRepository;

class EventService {

    private $repository;

    function __construct()
    {
        $this->repository = new EventRepository();
    }

    public function getAll($offset = NULL, $limit = NULL) {
        return $this->repository->getAll($offset, $limit);
    }

    public function getOne($id) {
        return $this->repository->getOne($id);
    }

    public function insert($event) {       
        return $this->repository->insert($event);        
    }

    public function update($event, $id) {       
        return $this->repository->update($event, $id);        
    }

    public function delete($id) {       
        return $this->repository->delete($id);        
    }
}

?>