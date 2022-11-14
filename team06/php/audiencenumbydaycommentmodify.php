<?php

$id= $_POST['id'];
$modify_content= $_POST['modify'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");


$sql= 
    "START TRANSACTION;
    update audience_ranking_by_day_comment set content = '$modify_content' where id=$id;
    select * from audience_ranking_by_day_comment;
    COMMIT;";
$result = mysqli_multi_query($mysqli, $sql);


echo "<script> document.location.href='../html/report1.php'; </script>";


?>