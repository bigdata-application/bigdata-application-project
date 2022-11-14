<?php
session_start(); 
if (!$_SESSION['user_name']) {//이게 실행되면 에러 있다는 것 (수정 버튼은 로그인한 사용자에게만 보여야함)
    	echo "<script> document.location.href='./login.php'; </script>";
} else {

	$userID = $_SESSION['user_idx'];
	$vote = $_REQUEST['snack']; 
	$mysqli = mysqli_connect("localhost", "root", "","team06"); 
	$sql = "
		UPDATE table user_prefer_food_vote SET food_name_id = ".$vote."' WHERE '". $userID."'';
	         ";  //voteModify.php에서 value 값으로 정수 전달
	$result = mysqli_query($mysqli, $sql); 
	if($result === false){
   		 echo mysqli_error($mysqli);
	}	
}
?>