<?php

$id= $_POST['id'];
$modify_content= $_POST['modify'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");


$sql= 
    "START TRANSACTION;
    update audience_range_comment set content = '$modify_content' where id=$id;
    select * from audience_range_comment;
    COMMIT;";
$result = mysqli_multi_query($mysqli, $sql);


echo "<script> document.location.href='../html/movieListByRangeAndNation.php'; </script>";


?>