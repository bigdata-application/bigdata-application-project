<?php


$id=$_POST['id'];//사용자가 입력한 id form
$pw = $_POST['pw']; // 사용자가 입력한 pw form

$mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

$sql= "select * from user where user_name='".$id."';";

$result = mysqli_query($mysqli, $sql);
$num= mysqli_num_rows($result);

while ($rowData= $result->fetch_array()) {
    $userId= $rowData['user_idx'];
    $verify= $rowData['user_pw'];
}

if($num==0) {//회원가입이 안되었다면 경고 후 회원가입 페이지로 리다이렉트
    echo "<script> alert('회원가입이 안 된 아이디입니다.') 
    document.location.href='../html/signup.html';</script>";
}
else{
    if($pw==$verify) {//로그인 성공하면 index 페이지로 리다이렉트
            //세션 생성 
               
            session_start();

            //세션 변수 등록
            $_SESSION['user_idx'] = $userId;
            $_SESSION['user_name'] = $id;
            $_SESSION['user_pw'] = $pw;

            //등록된 변수 사용
            //echo "user_idx 값: ".$_SESSION['user_idx']."<br/>";
            //echo "user_name 값: ".$_SESSION['user_name']."<br/>";
            //echo "user_pw 값: ".$_SESSION['user_pw']."<br/>";
            //echo session_id()."세션스타트후에 아이디출력<br>";

        echo "<script> document.location.href='../html/index.php'; </script>";
    }
    else {//비밀번호 잘못 입력하면 경고 후 로그인페이지 새로고침
        echo "<script> alert('비밀번호를 다시 입력하세요') 
        document.location.href='../html/login.html';</script>";
    }
}




?>