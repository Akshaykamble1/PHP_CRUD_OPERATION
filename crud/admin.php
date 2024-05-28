<!DOCTYPE html>
<?php
$email="";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if($email == 'ak@gmail.com' && $password == 'India@12'){
    header('location:display.php');
}
else{
    echo '<div class="alert alert-danger" role="alert">
        Email or Password is wrong!
    </div>';

    echo '<script>
        setTimeout(function() {
            var alertDiv = document.querySelector(".alert");
            if (alertDiv) {
                alertDiv.style.display = "none";
            }
        }, 3000); // 5000 milliseconds = 5 seconds
    </script>';



}

}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .adminPanel {
        border: 2px solid white;
        border-radius: 15px;
        color:white;
        height:470px;
    }
    .tempBtn {
        text-decoration: none;
        width: 60%;
        border-radius: 20px;
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
        border-bottom: 2px solid #93EBFB;
        background: none;
    }
    /* #569BA8 */
    .input-data input:focus ~ label {
        transform: translateY(-20px);
    }

    .wrapper .input-data label {
        position: absolute;
        bottom: 25px;
        font-size: 20px;
        left: 0;
        color: gold;
        pointer-events: none;
    }
    </style>
</head>

<body style="background:linear-gradient(115deg,#56d8e4 10%,#9f01ea 90%);">
    <div class="container my-5 w-50 adminPanel p-4" style="background-color:#649294">
        <h1 class="text-center mt-2">Admin Panel</h1>
        <form method="post"  action="admin.php" class="mt-3">
        <div class="wrapper mt-4">
                <div class="input-data">
                    <input type="email" class="form-control" name="email" autocomplete="off">
                    <label><h4><i>Email</i></h4></label>
                </div>
            </div>

            <div class="wrapper mt-4">
                <div class="input-data mt-4">
                    <input type="password" class="form-control" name="password" autocomplete="off" >
                    <label><h4><i>Password</i></h4></label>
                </div>
            </div>
            <div class="container text-center mt-5 ">
                <button type="submit" class="btn btn-primary tempBtn mb-5 me-5" name="submit">Submit</button>
            </div>
        </form>
</body>

</html>