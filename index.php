<?php

require('model/database.php');
require('model/todolist_db.php');

$task_id = filter_input(INPUT_POST, 'task_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action) {
        $action = 'list_tasks';
    }
}

switch($action) {
    case "add_task":
        if(!empty($title) && !empty($description)) {
            add_task($title, $description);
            header("Location: .?action=list_tasks");
            exit();
        } else {
            $error = "Invalid task data. Check all fields and try again.";
            include('view/error.php');
            exit();
        }
        break;
    case "delete_task":
        if($task_id) {
            delete_task($task_id);
            header("Location: .?action=list_tasks");
            exit();
        } else {
            $error = "Missing or incorrect task id.";
            include('view/error.php');
            exit();
        }
        break;
    default:
        $tasks = get_tasks();
        include('view/task_list.php');
}