<?php

$id= $_POST['delete'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");


/* Turn autocommit off */
mysqli_autocommit($mysqli, false);
$result = mysqli_query($mysqli, "select @@autocommit");
$row = mysqli_fetch_row($result);

try {
/* Prepare insert statement */
$stmt = mysqli_prepare($mysqli, 'delete from GENRE_RANKING_BY_NATION_COMMENT where id=?;');
mysqli_stmt_bind_param($stmt, 'i', $id);

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



?>