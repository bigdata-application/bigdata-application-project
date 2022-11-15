<?php

$id= $_POST['delete'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

$sql= 
    "START TRANSACTION;
    delete from GENRE_RANKING_BY_NATION_COMMENT where id=$id;
    select * from GENRE_RANKING_BY_NATION_COMMENT;
    COMMIT;";
$result = mysqli_multi_query($mysqli, $sql);


echo "<script> document.location.href='../html/movieListByGenre.php'; </script>";



?>