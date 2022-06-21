<?php
declare(strict_types=1);

namespace App\Model;

class Film
{
    public int $id;
    public string $title;
    public string $category;

    public function __construct(string $title, string $category)
    {
        $this->title = $title;
        $this->category = $category;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}