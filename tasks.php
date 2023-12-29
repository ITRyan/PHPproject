<?php
include 'config.php';
include 'functions.php';

session_start();

// Add a new task
function addTask($user_id, $title, $description, $due_date, $priority) {
    global $conn;

    $title = sanitizeInput($title);
    $description = sanitizeInput($description);
    $due_date = sanitizeInput($due_date);
    $priority = sanitizeInput($priority);

    $query = "INSERT INTO tasks (user_id, title, description, due_date, priority) VALUES ('$user_id', '$title', '$description', '$due_date', '$priority')";

    if ($conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Get tasks for a specific user
function getTasks($user_id) {
    global $conn;

    $query = "SELECT * FROM tasks WHERE user_id = '$user_id'";
    $result = $conn->query($query);

    $tasks = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }

    return $tasks;
}

// Other task-related functions (edit, delete) go here
?>
