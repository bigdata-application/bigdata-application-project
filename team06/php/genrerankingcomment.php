<?php


session_start();

if(!isset($_SESSION['user_name'])) {
    echo "<script> alert('use service after login'); document.location.href='../html/login.html'; </script>";

}

else{

    $content= $_POST['comment'];
    $this_user = $_SESSION['user_idx'];
    $genreOption = $_SESSION['genreValue'];


    $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
    

    //$sql= 
    "select genre_id from genre where genre_name='$genreOption';";

    //$genre_id = mysqli_query($mysqli, $sql);


    //echo $genre_id;

    $sql= 
    "START TRANSACTION;
    insert into GENRE_RANKING_BY_NATION_COMMENT(user_idx, genre_id, content) values($this_user, (select genre_id from genre where genre_name='$genreOption'),'".$content."');
    select * from GENRE_RANKING_BY_NATION_COMMENT;
    COMMIT;";

    //echo $sql;

    $result = mysqli_multi_query($mysqli, $sql);
    

    echo "<script> document.location.href='../html/movieListByGenre.php'; </script>";
}



?>
