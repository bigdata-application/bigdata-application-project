<?php

$id= $_POST['delete'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

$sql= 
    "START TRANSACTION;
    delete from audience_ranking_by_day_comment where id=$id;
    select * from audience_ranking_by_day_comment;
    COMMIT;";
$result = mysqli_multi_query($mysqli, $sql);


echo "<script> document.location.href='../html/report1.php'; </script>";



?>