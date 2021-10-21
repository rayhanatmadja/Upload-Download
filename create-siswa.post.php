<?php

include './connection.php';

$name = $_POST['name'];
$address = $_POST['address'];

$sql = "
    insert into students (name, address)
    values ('" . $name . "', '" . $address . "');
";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo 'Success create students';
} else {
    print('Failed create student: ' . mysqli_error($conn));
    exit();
}
