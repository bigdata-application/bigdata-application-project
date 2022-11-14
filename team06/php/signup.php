<?php


$id = $_POST['id']; //사용자가 입력한 아이디 form
$pw = $_POST['pw']; //사용자가 입력한 비밀번호 form

$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");


$sql= "select * from user where user_name='$id';";

$result= mysqli_query($mysqli, $sql);

$num=mysqli_num_rows($result);

if($num>0) {//이미 있는 아이디면 경고창 띄운 후 회원가입 새로고침
    echo "<script> alert('이미 존재하는 아이디입니다.'); document.location.href='../html/signup.html'; </script>";
}

else {
$sql= "insert into user(user_name, user_pw) values ('".$id."','". $pw."');";
//echo $sql;
$result = mysqli_query($mysqli, $sql);

    //login 페이지로 리다이렉트
    echo "<script> document.location.href='../html/login.html'; </script>";
}

?>