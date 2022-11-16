<?php

    session_start();

    if(!isset($_SESSION['user_name'])) {//로그인하지 않은 유저 로그인페이지로 리다이렉트
        echo "<script> alert('use service after login'); document.location.href='../html/login.html'; </script>";
    }
    else{
    $content= $_POST['comment'];
    $this_user = $_SESSION['user_idx'];
    $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
    

        
    /* Turn autocommit off */
    mysqli_autocommit($mysqli, false);
    $result = mysqli_query($mysqli, "select @@autocommit");
    $row = mysqli_fetch_row($result);

    try {
    /* Prepare insert statement */
    $stmt = mysqli_prepare($mysqli, 'insert into audience_ranking_by_day_comment(user_idx, content) VALUES (?,?)');
    mysqli_stmt_bind_param($stmt, 'is', $this_user, $content);
    
    mysqli_stmt_execute($stmt);
   
    /* Commit the data in the database. This doesn't set autocommit=true */
    mysqli_commit($mysqli);

    $result = mysqli_query($mysqli, "SELECT @@autocommit");
    $row = mysqli_fetch_row($result);
    
    /* Setting autocommit=true will trigger a commit */
    mysqli_autocommit($mysqli, true);

} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    throw $exception;
    }
    
    echo "<script> document.location.href='../html/report1.php'; </script>";


}

?>