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
   
    
    $sql="select genre_id from genre where genre_name='$genreOption'";
    $result = mysqli_query($mysqli, $sql);
    
    while ($rowData= $result->fetch_array()) {
        $genre_id= $rowData['genre_id'];
    }

    mysqli_autocommit($mysqli, false);
    $result = mysqli_query($mysqli, "select @@autocommit");
    $row = mysqli_fetch_row($result);
    
    try {
    /* Prepare insert statement */
    $stmt = mysqli_prepare($mysqli, 'insert into GENRE_RANKING_BY_NATION_COMMENT(user_idx, genre_id, content) values(?, ?, ?)');
    mysqli_stmt_bind_param($stmt, 'iis', $this_user, $genre_id, $content);
    
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

    echo "<script> document.location.href='../html/movieListByGenre.php'; </script>";
}



?>
