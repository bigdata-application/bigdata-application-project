<?php

    session_start();

    if(!isset($_SESSION['user_name'])) {
        echo "<script> alert('use service after login'); document.location.href='../html/login.html'; </script>";


    }
    else{
        $content= $_POST['comment'];
        $this_user = $_SESSION['user_idx'];
        $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
        $sql= 
        "START TRANSACTION;
        insert into audience_range_comment(user_idx, range_id, content) values($this_user, (select range_id from audience_range where audience_range='".$_SESSION['rangeValue']."'),'$content');
        select * from audience_range_comment;
        COMMIT;";
        $result = mysqli_multi_query($mysqli, $sql);
        //echo $sql;
        echo "<script> document.location.href='../html/movieListByRange.php'; </script>";
}

?>