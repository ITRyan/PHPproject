<?php
$db_host = 'host';
$db_user = 'admin';
$db_password = '';
$db_name = 'samson';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
