<?php
    include 'connect.php';

    if(isset($_GET['deleteid']))
    {
        $Id=$_GET['deleteid'];

        $sql="delete from `crud` where Id=$Id";
        $result=mysqli_query($con,$sql);

        if($result)
        {
            // echo "Deleted successfully";
            header('location:display.php');
        }
        else
        {
            die(mysqli_error($con));
        }
    }
?>
