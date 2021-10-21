<?php
include "connection.php";

$id = $_GET['id'];
$today = date('Y-m-d');
$result = $conn->query('update students set kehadiran = "' . $null . '" where id = "' . $id . '"');

if (!$result) {
    var_dump($conn->query);
    exit();
}

header('Location: index.php');
