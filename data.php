<?php
include_once 'db_config.php';

$query = "SELECT id, firstname, lastname, age, `datetime`, currency FROM datas";
$result = $connection->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $row['actions'] = '<button class="editButton btn btn-primary" data-id="' . $row['id'] . '">Edit</button><button class="deleteButton btn btn-danger" data-id="' . $row['id'] . '">Delete</button>';
    $data[] = $row;
}
header('Content-Type: application/json');

// Return data as JSON
if (empty($data)) {
    echo json_encode(array("data" => array())); // Send an empty data array if there are no records
} else {
    echo json_encode(array("data" => $data));
}

$connection->close();
