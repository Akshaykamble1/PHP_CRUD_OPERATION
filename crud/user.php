<?php

include 'connect.php';

if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Mobile = $_POST['mobile'];
    $Password = $_POST['password'];

    $sql = "INSERT INTO `crud` (Name, Email, Mobile, Password) VALUES ('$Name', '$Email', '$Mobile', '$Password')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<div class="alert alert-success" role="alert">
         <b>Your Record Submitted Succesfully!</b>
        </div>';
        echo '<script>
        setTimeout(function() {
            var alertDiv = document.querySelector(".alert");
            if (alertDiv) {
                alertDiv.style.display = "none";
            }
        }, 3000); // 5000 milliseconds = 5 seconds
    </script>';

        // header('location:display.php');
    } else {
        die(mysqli_error($con));
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD OPERTION</title>
    <style>
        .container {
            border: 2px solid black;
            border-radius: 10px;
            margin-top: 30px;
            height: 630px;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .wrapper {
            width: 450px;
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
            width: 700px;
            border: none;
            font-size: 17px;
            border-bottom: 2px solid silver;
            background: none;
        }

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

        .a:hover {
            background: -webkit-linear-gradient(left, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body style="background:linear-gradient(115deg,#56d8e4 10%,#9f01ea 90%);">
    <div class="container  w-50" style="background: #E4D6F6;">
        <b class="text-center">
            <h1 class="mt-3 text">User Form</h1>
        </b>
        <form method="post">
            <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="text" class="form-control" name="name" autocomplete="off">
                    <label>Name</label>
                </div>
            </div>

            <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="email" class="form-control" name="email" autocomplete="off">
                    <label>Email</label>
                </div>
            </div>

            <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="text" class="form-control" name="mobile" autocomplete="off">
                    <label>Mobile</label>
                </div>
            </div>

            <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="text" class="form-control" name="password">
                    <label>Password</label>
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary mt-5 a" name="submit"><b>Submit</b></button>
            </center>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    </div>
</body>

</html>