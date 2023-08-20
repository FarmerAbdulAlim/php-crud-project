<?php
include_once 'db_config.php';

$id = $_POST['id'];

$query = "DELETE FROM datas WHERE id = '$id'";
$connection->query($query);

$connection->close();
