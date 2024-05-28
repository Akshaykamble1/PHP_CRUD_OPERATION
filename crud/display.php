<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script>
    $(document).ready(function() {
        $("#myTable").dataTable();
    });
    </script>
</head>

<body>
    <div class="card" style="background-color:#e1e1e1;">
        <div class=" container-fluid  mt-5 card-header">
            <h5><b>Stdent Record<b></h5>
        </div>
        <div class="card-body">
            <div class="container-fuild mt-5">
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Password</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                $sql = "SELECT * FROM `crud`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $Id = $row['Id'];
                        $Name = $row['Name'];
                        $Email = $row['Email'];
                        $Mobile = $row['Mobile'];
                        $Password = $row['Password'];

                        echo '
                        <tr>
                            <th scope="row">' . $Id . '</th>
                            <td>' . $Name . '</td>
                            <td>' . $Email . '</td>
                            <td>' . $Mobile . '</td>
                            <td>' . $Password . '</td>
                            <td>
                                <a href="update.php? updateid=' . $Id . '" class="btn btn-primary text-light">Update</a>
                                <a href="delete.php? deleteid=' . $Id . '"
                                 class="btn btn-danger text-light ml-3">Delete</a>
                            </td>
                        </tr>';
                    }
                }
                ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary my-5" style="text-decoration:none"><a href="user.php"
                        class="text-light">Add
                        user</a></button>

            </div>
        </div>
    </div>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
    let table = new DataTable('#myTable');
    </script>
</body>

</html>