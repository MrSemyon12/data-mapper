<?php

namespace App\Repository;

class Repository
{
    private DataMapper $dataMapper;
    private array $arrayData;

    public function __construct()
    {
        $this->dataMapper = new DataMapper();
        $this->arrayData = $this->dataMapper->getAll();
    }

    public function getAll(): array
    {
        return $this->arrayData;
    }

    public function getById($id): array
    {
        return $this->dataMapper->getById($id);
    }

    public function getByField($field): array
    {
        return $this->dataMapper->getByField($field);
    }

    public function addRow($title, $category): void
    {
        $this->dataMapper->addRow($title, $category);
    }

    public function deleteById($id): void
    {
        $this->dataMapper->deleteById($id);
    }
}