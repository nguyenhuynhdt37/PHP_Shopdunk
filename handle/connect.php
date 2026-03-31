<?php
    $server   = getenv('DB_HOST')     ?: 'localhost';
    $user     = getenv('DB_USER')     ?: 'root';
    $password = getenv('DB_PASSWORD') ?: '';
    $database = getenv('DB_NAME')     ?: 'web';

    $conn = new mysqli($server, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>