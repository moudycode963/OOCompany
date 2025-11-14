<?php

spl_autoload_register(function ($class) {
    include './classes/' . $class . '.php';
});

$action = isset($_GET['action']) ? $_GET['action'] : false;

switch ($action) {
    case 'showEditDepartment':
        $view = 'editDepartment';
        break;
    case 'showEditEmployee':
        $view = 'editEmployee';
        break;
    case 'showListEmployees':
        $view = 'listEmployees';
        break;
    case 'showListDepartments':
        $view = 'listDepartments';
        break;
    default:
        // Standard output
        $view = 'listDepartments';
        break;
}

// Include the view file that outputs the full page (HTML + body)
include 'views/' . $view . '.php';

?>
