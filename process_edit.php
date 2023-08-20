<?php
include_once 'db_config.php';

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$datetime = $_POST['datetime'];
$currency = $_POST['currency'];

$query = "UPDATE datas SET firstname = '$firstname', lastname = '$lastname', age = '$age', datetime = '$datetime', currency = '$currency' WHERE id = '$id'";
$connection->query($query);

$connection->close();

header("Location: index.php"); // Redirect to the main page after updating
