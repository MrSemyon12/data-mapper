<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Repository\Repository;
use App\View\View;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates/');
$twig = new Environment($loader);
$view = new View($twig);
$repository = new Repository();

$view->showHeader();

if (isset($_GET['getAll'])) {
    $view->showTable($repository->getAll());
}

if (isset($_GET['getById'])) {
    $view->showGetById();
}
if (isset($_GET['getIdButton'])) {
    $id = $_GET['getId'];
    if ($id != null) {
        $view->showTable($repository->GetById($id));
    }
}

if (isset($_GET['getByField'])) {
    $view->showGetByField();
}
if (isset($_GET['getFieldButton'])) {
    $field = $_GET['field'];
    if ($field != null) {
        $view->showTable($repository->getByField($field));
    }
}

if (isset($_GET['addRow'])) {
    $view->showAddRow();
}
if (isset($_GET['addButton'])) {
    $title = $_GET['title'];
    $category = $_GET['category'];
    if ($title != null && $category != null) {
        $repository->addRow($title, $category);
    }
}

if (isset($_GET['deleteById'])) {
    $view->showDeleteById();
}
if (isset($_GET['deleteButton'])) {
    $id = $_GET['delId'];
    if ($id != null) {
        $repository->deleteById($id);
    }
}