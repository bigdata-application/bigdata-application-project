<?php


session_start();

if(!$_SESSION['user_idx']) {
    echo "<script> document.location.href='./login.php'; </script>";

}

else{

    $content= $_POST['comment'];
    $this_user = $_SESSION['user_idx'];
    $genreOption = $_SESSION['genreValue'];


    $mysqli= mysqli_connect("localhost", "team06", "", "team06");
    
    $sql= 
    "START TRANSACTION;
    insert into genre_ranking_comment(user_idx, genre, content) values($this_user, '".$_SESSION['genreValue']."','".$_POST['comment']."');
    select * from genre_ranking_comment;
    COMMIT;";
    $result = mysqli_multi_query($mysqli, $sql);
    

    echo "<script> document.location.href='../html/movieListByGenre.php'; </script>";
}


?>
