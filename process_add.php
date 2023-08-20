<?php
include_once 'db_config.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$datetime = $_POST['datetime'];
$currency = $_POST['currency'];

$query = "INSERT INTO datas (firstname, lastname, age, `datetime`, currency) VALUES ('$firstname', '$lastname', '$age', '$datetime', '$currency')";
if ($connection->query($query) === TRUE) {
    // Successfully inserted
    header("Location: index.php"); // Redirect to the main page after adding
} else {
    // Handle error, you can redirect or display an error message
    echo "Error: " . $query . "<br>" . $connection->error;
}

$connection->close();
