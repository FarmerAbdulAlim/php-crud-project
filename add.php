<!DOCTYPE html>
<html>

<head>
    <!-- Include necessary libraries and styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Add New Record</h2>
        <form action="process_add.php" method="POST">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="form-group">
                <label for="datetime">Date Time</label>
                <input type="date" class="form-control" id="datetime" name="datetime">
            </div>
            <div class="form-group">
                <label for="currency">Currency (£)</label>
                <input type="number" class="form-control" id="currency" name="currency" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Add Record</button>
        </form>
    </div>
</body>

</html>