<?php

    session_start();

    if(!isset($_SESSION['user_name'])) {
        echo "<script> alert('use service after login'); document.location.href='../html/login.html'; </script>";

    }
    else{//댓글 입력하면 movieListByRangeAndNation 페이지로 리다이렉트
        $content= $_POST['comment'];
        $this_user = $_SESSION['user_idx'];
        $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
        $range=$_SESSION['rangeValue'];
        $nation=$_SESSION['nationValue'];
        $sql=
        "START TRANSACTION;
        insert into audience_range_comment(user_idx, range_id, nation_id, content) values($this_user,(select range_id from audience_range where audience_range='$range' ), (select nation_id from nation where nation_name='$nation'),'$content');
        select * from audience_range_comment;
        COMMIT;";
        $result = mysqli_multi_query($mysqli, $sql);
        //(select range_id from audience_range where audience_range='$range' )&& nation_id= (select nation_id from nation where nation_name='$nation'
        //echo $sql;
        echo "<script> document.location.href='../html/movieListByRangeAndNation.php'; </script>";
}

?>