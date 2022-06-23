<?php
declare(strict_types=1);

namespace App\Model;

class Film
{
    public int $id;
    public string $title;
    public string $category;

    public function __construct(int $id, string $title, string $category)
    {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
    }
}