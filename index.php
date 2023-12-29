<?php
include 'auth.php';
include 'tasks.php';

// Example usage
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        // Successful login, redirect or display a message
        header('Location: dashboard.php');
        exit;
    } else {
        // Failed login, display an error message
        $login_error = "Invalid username or password";
    }
}

// Similarly, you can use addTask() and getTasks() functions for task-related operations
?>
