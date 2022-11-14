<?php

    session_start();

    if(!$_SESSION['user_idx']) {
        echo "<script> document.location.href='./login.php'; </script>";

    }
    else{
    $content= $_POST['comment'];
    $this_user = $_SESSION['user_idx'];
    $mysqli= mysqli_connect("localhost", "team06", "", "team06");
    $sql= 
    "START TRANSACTION;
    insert into audience_comment(user_idx, content) values($this_user, '$content');
    select * from audience_comment;
    COMMIT;";
    $result = mysqli_multi_query($mysqli, $sql);
    

    echo "<script> document.location.href='../html/report2-1.php'; </script>";
}

?>