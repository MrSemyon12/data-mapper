<?php

namespace App\Repository;

use App\Model\Film;
use PDO;

class DataMapper
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=mydb',
            'user123',
            'PASSWORD'
        );
        $this->pdo->exec('CREATE TABLE IF NOT EXISTS films(id INT AUTO_INCREMENT, title VARCHAR(255), category VARCHAR(255), PRIMARY KEY(id))');
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM films';
        $tmp = $this->pdo->prepare($query);
        $tmp->execute();
        $data = $tmp->fetchAll();
        $objects = array();
        foreach ($data as $row){
            $objects[] = new Film($row['id'], $row['title'], $row['category']);
        }
        return $objects;
    }

    public function getById($id): array
    {
        $query = 'SELECT * FROM films WHERE id = :id';
        $tmp = $this->pdo->prepare($query);
        $tmp->execute(['id' => $id]);
        $data = $tmp->fetchAll();
        $objects = array();
        if (!empty($data)) {
            foreach ($data as $row) {
                $objects[] = new Film($row['id'], $row['title'], $row['category']);
            }
        }
        else {
            echo 'Запись не найдена!';
        }
        return $objects;
    }

    public function getByField($field): array
    {
        $query = 'SELECT * FROM films WHERE title = :field OR category = :field';
        $tmp = $this->pdo->prepare($query);
        $tmp->execute(['field' => $field]);
        $data = $tmp->fetchAll();
        $objects = array();
        if (!empty($data)) {
            foreach ($data as $row){
                $objects[] = new Film($row['id'], $row['title'], $row['category']);
            }
        }
        else {
            echo 'Запись не найдена!';
        }
        return $objects;
    }

    public function addRow($title, $category): void
    {
        $query = 'INSERT INTO films(title, category) VALUES(:title, :category)';
        $tmp = $this->pdo->prepare($query);
        $tmp->execute(['title' => $title, 'category' => $category]);
        echo 'Запись добавлена!';
    }

    public function deleteById($id): void
    {
        $query = 'DELETE FROM films WHERE id = :id';
        $tmp = $this->pdo->prepare($query);
        $tmp->execute(['id' => $id]);
        if ($tmp->rowCount() == 0) {
            echo 'Запись не найдена!';
        } else {
            echo 'Запись удалена!';
        }
    }
}