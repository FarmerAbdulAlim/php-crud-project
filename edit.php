<?php
include_once 'db_config.php';

$id = $_GET['id'];

$query = "SELECT * FROM datas WHERE id = '$id'";
$result = $connection->query($query);
$row = $result->fetch_assoc();

$connection->close();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Include necessary libraries and styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Record</h2>
        <form action="process_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>">
            </div>
            <div class="form-group">
                <label for="datetime">Date Time</label>
                <input type="date" class="form-control" id="datetime" name="datetime" value="<?php echo $row['datetime']; ?>">
            </div>
            <div class="form-group">
                <label for="currency">Currency (£)</label>
                <input type="number" class="form-control" id="currency" name="currency" value="<?php echo $row['currency']; ?>" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>

</html>