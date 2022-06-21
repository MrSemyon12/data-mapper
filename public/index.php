<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Repository\Repository;
use App\Repository\DataMapper;
use App\Model\Film;
use App\View\View;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates/');
$twig = new Environment($loader);
$view = new View($twig);
$repository = new Repository();

$view->__invokeHeader();

if (isset($_GET['getAll'])) {
    $view->__invokeTable($repository->getAll());
}

if (isset($_GET['getById'])) {
    $view->__invokeGetById();
}
if (isset($_GET['getIdButton'])) {
    $id = $_GET['getId'];
    if ($id != null) {
        $view->__invokeTable($repository->GetById($id));
    }
}

if (isset($_GET['getByField'])) {
    $view->__invokeGetByField();
}
if (isset($_GET['getFieldButton'])) {
    $field = $_GET['field'];
    if ($field != null) {
        $view->__invokeTable($repository->getByField($field));
    }
}

if (isset($_GET['addRow'])) {
    $view->__invokeAddRow();
}
if (isset($_GET['addButton'])) {
    $title = $_GET['title'];
    $category = $_GET['category'];
    if ($title != null && $category != null) {
        $repository->addRow($title, $category);
    }
}

if (isset($_GET['deleteById'])) {
    $view->__invokeDeleteById();
}
if (isset($_GET['deleteButton'])) {
    $id = $_GET['delId'];
    if ($id != null) {
        $repository->deleteById($id);
    }
}