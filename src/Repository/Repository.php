<?php

namespace App\Repository;

use App\Model\Film;
use PDO;

class Repository
{
    private DataMapper $dataMapper;
    private $arrayData;

    public function __construct()
    {
        $this->dataMapper = new DataMapper();
        $this->arrayData = $this->dataMapper->getAll();
    }

    public function getAll()
    {
        return $this->arrayData;
    }

    public function getById($id)
    {
        return $this->dataMapper->getById($id);
    }

    public function getByField($field)
    {
        return $this->dataMapper->getByField($field);
    }

    public function addRow($title, $category)
    {
        $this->dataMapper->addRow($title, $category);
    }

    public function deleteById($id)
    {
        $this->dataMapper->deleteById($id);
    }
}