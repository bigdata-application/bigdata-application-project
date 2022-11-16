<?php

$id= $_POST['id'];
$modify_content= $_POST['modify'];


$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");


/* Turn autocommit off */
mysqli_autocommit($mysqli, false);
$result = mysqli_query($mysqli, "select @@autocommit");
$row = mysqli_fetch_row($result);

try {
/* Prepare insert statement */
$stmt = mysqli_prepare($mysqli, 'update audience_range_comment set content = ? where id=?;');
mysqli_stmt_bind_param($stmt, 'si', $modify_content, $id);

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

echo "<script> document.location.href='../html/report2-1.php'; </script>";


?>