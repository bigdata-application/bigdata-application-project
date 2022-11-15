<?php

$id= $_POST['delete'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

$sql= 
    "START TRANSACTION;
    delete from audience_comment where id=$id;
    select * from audience_comment;
    COMMIT;";
$result = mysqli_multi_query($mysqli, $sql);


echo "<script> document.location.href='../html/report2-1.php'; </script>";



?>