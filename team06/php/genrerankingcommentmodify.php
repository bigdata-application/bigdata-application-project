<?php

$id= $_POST['id'];
$modify_content= $_POST['modify'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");


$sql= 
    "START TRANSACTION;
    update GENRE_RANKING_COMMENT set content = '$modify_content' where id=$id;
    select * from GENRE_RANKING_COMMENT;
    COMMIT;";
$result = mysqli_multi_query($mysqli, $sql);


echo "<script> document.location.href='../html/movieListByGenre.php'; </script>";


?>