<?php

$id= $_POST['delete'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

$sql= 
    "START TRANSACTION;
    delete from prefer_food_ranking_comment where id=$id;
    select * from prefer_food_ranking_comment;
    COMMIT;";
$result = mysqli_multi_query($mysqli, $sql);


echo "<script> document.location.href='../html/voteResult.php'; </script>";



?>