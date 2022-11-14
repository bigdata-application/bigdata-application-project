<?php


session_start();

if(!$_SESSION['user_idx']) {
    echo "<script> document.location.href='./login.php'; </script>";

}

else{

    $content= $_POST['comment'];
    $this_user = $_SESSION['user_idx'];
    $nationOption = $_SESSION['nationOption'];


    $mysqli= mysqli_connect("localhost", "team06", "", "team06");
    
    $sql= 
    "START TRANSACTION;
    insert into GENRE_RANKING_BY_NATION_COMMENT(user_idx, nation_id, content) values($this_user, '".$_SESSION['nationOption']."','".$_POST['comment']."');
    select * from GENRE_RANKING_BY_NATION_COMMENT;
    COMMIT;";
    $result = mysqli_multi_query($mysqli, $sql);
    

    echo "<script> document.location.href='../html/movieListByGenreAndNation.php'; </script>";
}



?>