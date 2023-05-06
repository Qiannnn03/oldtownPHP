<?php

$connection = new mysqli("php-database.cdnok204jmx0.us-east-1.rds.amazonaws.com","admin","admin123");
$db = mysqli_select_db($connection, 'oldtown');

if(isset($_POST['add_event']))
{

    $name = $_POST['name'];
    $price = $_POST['price'];
    $date = $_POST['date'];




    $query = "INSERT INTO product (`name`,price,date) VALUES ('$name',$price,'$date')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>