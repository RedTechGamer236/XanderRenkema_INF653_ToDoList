<?php
function get_tasks() {
    global $db;
    $query = 'SELECT * FROM todoitems ORDER BY ItemNum';
    $statement = $db -> prepare($query);
    $statement -> execute();
    $tasks = $statement -> fetchAll();
    $statement -> closeCursor();
    return $tasks;
}

function delete_task($task_id) {
    global $db;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :taskID';
    $statement = $db -> prepare($query);
    $statement -> bindValue(':taskID', $task_id);
    $statement -> execute();
    $statement -> closeCursor();
}

function add_task($title, $description) {
    global $db;
    $query = 'INSERT INTO todoitems (Title, Description) VALUES (:task, :descr)';
    $statement = $db -> prepare($query);
    $statement -> bindValue(':task', $title);
    $statement -> bindValue(':descr', $description);
    $statement -> execute();
    $statement -> closeCursor();
}