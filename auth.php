<?php
include 'config.php';
include 'functions.php';

session_start();

// User login
function login($username, $password) {
    global $conn;

    $username = sanitizeInput($username);
    $password = sanitizeInput($password);

    $hashed_password = hash('sha256', $password);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    } else {
        return false;
    }
}

// Other user-related functions (register, logout) go here
?>
