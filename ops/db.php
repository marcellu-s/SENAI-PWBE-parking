<?php

    $host = 'localhost';
    $user = 'id20587536_root';
    $senha = 'c-y5L!7wPUkq6}Im';
    $database = 'id20587536_swiftbd';

    $conn = new mysqli($host, $user, $senha, $database);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
?>