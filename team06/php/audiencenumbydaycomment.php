<?php

    session_start();

    if(!$_SESSION['user_idx']) {//로그인하지 않은 유저 로그인페이지로 리다이렉트
        //echo "세션 아이디 ㄴㄴ";
        echo "<script> document.location.href='./login.php'; </script>";

    }
    else{//댓글 입력하면 report1 페이지로 리다이렉트
    $content= $_POST['comment'];
    //echo $content."<br>";
    //echo $_SESSION['user_idx'];
    $this_user = $_SESSION['user_idx'];
    $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
    $sql= 
    "START TRANSACTION;
    insert into audience_ranking_by_day_comment(user_idx, content) values($this_user, '$content');
    select * from audience_ranking_by_day_comment;
    COMMIT;";
    $result = mysqli_multi_query($mysqli, $sql);
    

    echo "<script> document.location.href='../html/report1.php'; </script>";
}

?>