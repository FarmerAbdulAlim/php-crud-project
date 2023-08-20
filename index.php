<!DOCTYPE html>
<html>

<head>
    <title>CRUD with DataTables</title>
    <!-- Include necessary libraries and styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .selected {
            background-color: #81ecec !important;
            /* Change this color to your preferred background color */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">CRUD with DataTables</h2>
        <button id="addButton" class="btn btn-primary mb-3">Add New Record</button>
        <button id="selectedRowsButton" class="btn btn-success mb-3">View Selected Rows</button>
        <table id="datatable" class="display table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Date Time</th>
                    <th>Currency</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        var selectedRows = []; // Array to store selected rows' data

        $(document).ready(function() {
            var dataTable = $('#datatable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "select": "multi", // Enable multi-row selection
                "ajax": {
                    "url": "data.php",
                    "type": "POST"
                },
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "firstname"
                    },
                    {
                        "data": "lastname"
                    },
                    {
                        "data": "age"
                    },
                    {
                        "data": "datetime"
                    },
                    {
                        "data": "currency"
                    },
                    {
                        "data": "actions"
                    }
                ],
                "createdRow": function(row, data, dataIndex) {
                    $(row).addClass('clickable');

                    $(row).click(function() {
                        var isSelected = $(this).hasClass('selected');

                        if (isSelected) {
                            $(this).removeClass('selected');
                            removeSelectedRow(data); // Remove row from selectedRows array
                        } else {
                            $(this).addClass('selected');
                            addSelectedRow(data); // Add row to selectedRows array
                        }
                    });
                }
            });

            function addSelectedRow(data) {
                var index = selectedRows.findIndex(function(row) {
                    return row.id === data.id; // Check if row is already in selectedRows
                });

                if (index === -1) {
                    selectedRows.push(data);
                }
            }

            function removeSelectedRow(data) {
                var index = selectedRows.findIndex(function(row) {
                    return row.id === data.id; // Find and remove row from selectedRows
                });

                if (index !== -1) {
                    selectedRows.splice(index, 1);
                }
            }

            $('#addButton').click(function() {
                window.location.href = 'add.php';
            });

            $('#selectedRowsButton').click(function() {
                localStorage.setItem('selectedRows', JSON.stringify(selectedRows));
                window.location.href = 'selected_rows.php';
            });

            $('#datatable').on('click', '.editButton', function() {
                var id = $(this).data('id');
                window.location.href = 'edit.php?id=' + id;
            });

            $('#datatable').on('click', '.deleteButton', function() {
                var id = $(this).data('id');
                if (confirm("Are you sure you want to delete this record?")) {
                    $.ajax({
                        url: 'delete.php',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            // Reload the DataTables to reflect the changes
                            dataTable.ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>