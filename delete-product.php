<?php
$connection = new mysqli("php-database.cdnok204jmx0.us-east-1.rds.amazonaws.com","admin","admin123");
$db = mysqli_select_db($connection, 'oldtown');

if(isset($_POST['delete']))
{
    $id = $_POST['delete-id'];

    $query = "DELETE FROM product WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:manage.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>