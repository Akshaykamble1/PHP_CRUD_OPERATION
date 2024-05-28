<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Retrieve the 'updateid' from the query string
    $Id = $_GET['updateid'] ?? '';

    // Check if the ID is valid
    if (!is_numeric($Id)) {
        // echo "Invalid ID";
        exit;
    }

    // Construct and execute the SQL query to fetch the record
    $sql = "SELECT * FROM `crud` WHERE Id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $Id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the record
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            echo "Record not found";
            exit;
        }

        $Name = $row['Name'];
        $Email = $row['Email'];
        $Mobile = $row['Mobile'];
        $Password = $row['Password'];
    } else {
        echo "Error: " . mysqli_error($con);
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle form submission
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Mobile = $_POST['mobile'];
    $Password = $_POST['password'];

    $Id = $_POST['updateid'] ?? '';

    echo "This is id=$Id";
    // Use prepared statements to update the record
    $sql = "UPDATE `crud` SET Name=?, Email=?, Mobile=?, Password=? WHERE Id=? ";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $Name, $Email, $Mobile, $Password, $Id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Data updated successfully
            header('location: display.php');
            //         echo '<div class="alert alert-success" role="alert">
            //         <b>Your Record Updated Succesfully!</b>
            //        </div>';
            //        echo '<script>
            //        setTimeout(function() {
            //            var alertDiv = document.querySelector(".alert");
            //            if (alertDiv) {
            //                alertDiv.style.display = "none";
            //            }
            //        }, 3000); // 5000 milliseconds = 5 seconds
            //    </script>';

        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD OPERATION</title>
    <style>
        .align {
            border: 2px solid black;
            border-radius: 10px;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            /* top: 30px; */
            /* position: relative; */
            min-height: 50vh;
        }

        .btn {
            background: linear-gradient(to left, #16a085, #f4d03f);
            color: black;
        }

        .btn:hover {
            background: linear-gradient(to right, #16a085, #f4d03f);
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .wrapper {
            width: 400px;
            /* background: #fff; */
            padding: 20px;
            /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); */
        }

        .wrapper .input-data {
            height: 40px;
            width: 100%;
            position: relative;
        }

        .wrapper .input-data input {
            height: 100%;
            width: 600px;
            border: none;
            font-size: 17px;
            border-bottom: 2px solid silver;
            background: none;
        }

        /* #569BA8 */
        .input-data input:focus~label {
            transform: translateY(-20px);
        }

        .wrapper .input-data label {
            position: absolute;
            bottom: 25px;
            font-size: 20px;
            left: 0;
            color: blue;
            pointer-events: none;
        }

        .text {
            background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn {
            background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            color: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .btn:hover{
            background: -webkit-linear-gradient(left, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body style="background:linear-gradient(115deg,#56d8e4 10%,#9f01ea 90%);">
    <div class="container my-5">
        <form method="post" action="update.php" class="w-50 align " style="background: #E4D6F6;" ;>
            <h2 class="text-center mt-4 text"><b>Update_Info</b></h2>
            <input type="hidden" name="updateid" value="<?php echo $Id; ?>">
            <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="text" class="form-control" name="name" autocomplete="off" value="<?php echo $Name; ?>">
                    <label>Name</label>
                </div>
            </div>

            <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $Email; ?>">
                    <label>Email</label>
                </div>
            </div>

            <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="text" class="form-control" name="mobile" autocomplete="off" value="<?php echo $Mobile; ?>">
                    <label>Mobile</label>
                </div>
            </div>

            <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="text" class="form-control" name="password" value="<?php echo $Password; ?>">
                    <label>Password</label>
                </div>
            </div>

            <center>
                <button type="submit" class="btn btn-primary mb-4 mt-3 " name="submit"><b>Update</b></button>
            </center>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- background: linear-gradient(to bottom, #16a085, #f4d03f); -->
<!-- background:linear-gradient(115deg,#56d8e4 10%,#9f01ea 90%); -->