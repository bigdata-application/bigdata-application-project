<?php

    session_start();

    if(!$_SESSION['user_idx']) {
        echo "<script> document.location.href='./login.php'; </script>";

    }
    else{//댓글 입력하면 movieListByRangeAndNation 페이지로 리다이렉트
        $content= $_POST['comment'];
        $this_user = $_SESSION['user_idx'];
        $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
        $sql= 
        "START TRANSACTION;
        insert into audience_range_nation_comment(user_idx, content) values($this_user, '$content');
        select * from audience_range_nation_comment;
        COMMIT;";
        $result = mysqli_multi_query($mysqli, $sql);
        

        echo "<script> document.location.href='../html/movieListByRangeAndNation.php'; </script>";
}

?>