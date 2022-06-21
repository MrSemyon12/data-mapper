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
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS films(id INT AUTO_INCREMENT, title VARCHAR(255), category VARCHAR(255), PRIMARY KEY(id))");
    }

    public function getAll()
    {
        $query = "SELECT * FROM films";
        $tmp = $this->pdo->prepare($query);
        $tmp->execute();
        return $this->pdo->query($query);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM films WHERE id = $id";
        $tmp = $this->pdo->prepare($query);
        $tmp->execute();
        if ($tmp->fetchAll()){
            return $this->pdo->query($query);
        }
        else {
            echo '<br><label>Запись не найдена!</label>';
        }
    }

    public function getByField($field)
    {
        $query = "SELECT * FROM films WHERE title = '$field' OR category = '$field'";
        $tmp = $this->pdo->prepare($query);
        $tmp->execute();
        if ($tmp->fetchAll()){
            return $this->pdo->query($query);
        }
        else {
            echo '<br><label>Запись не найдена!</label>';
        }
    }

    public function addRow($title, $category)
    {
        $query = "INSERT INTO films(title, category) VALUES('$title', '$category')";
        $tmp = $this->pdo->prepare($query);
        $tmp->execute();
        echo '<br><label>Запись добавлена!</label>';
    }

    public function deleteById($id)
    {
        $query = "DELETE FROM films WHERE id = $id";
        $tmp = $this->pdo->prepare($query);
        $tmp->execute();
        if ($tmp->rowCount() == 0) {
            echo '<br><label>Запись не найдена!</label>';
        } else {
            echo '<br><label>Запись удалена!</label>';
        }
    }
}