<!DOCTYPE html>
<html>

<head>
    <title>Selected Rows</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="text-center">Selected Rows</h2>
            <table class="table table-striped table-info">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Date Time</th>
                        <th>Currency</th>
                    </tr>
                </thead>
                <tbody id="selectedRowsBody">
                    <!-- Selected rows will be added here using JavaScript -->
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    <script>
        var selectedRowsData = JSON.parse(localStorage.getItem('selectedRows'));

        var selectedRowsBody = document.getElementById('selectedRowsBody');
        selectedRowsData.forEach(function(row) {
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${row.id}</td>
                <td>${row.firstname}</td>
                <td>${row.lastname}</td>
                <td>${row.age}</td>
                <td>${row.datetime}</td>
                <td>${row.currency}</td>
            `;
            selectedRowsBody.appendChild(newRow);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>