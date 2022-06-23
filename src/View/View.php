<?php

namespace App\View;

use Twig\Environment;

class View
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function showHeader(): void
    {
        $this->twig->display('header.twig');
    }

    public function showTable($table): void
    {
        $this->twig->display('table.twig', ['table' => $table]);
    }

    public function showGetById(): void
    {
        $this->twig->display('getById.twig');
    }

    public function showGetByField(): void
    {
        $this->twig->display('getByField.twig');
    }

    public function showAddRow(): void
    {
        $this->twig->display('addRow.twig');
    }

    public function showDeleteById(): void
    {
        $this->twig->display('deleteById.twig');
    }
}