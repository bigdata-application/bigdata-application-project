<?php
session_start(); 
if (!$_SESSION['user_name']) {//이게 실행되면 에러 있다는 것 (수정 버튼은 로그인한 사용자에게만 보여야함)
    	echo "<script> document.location.href='./login.php'; </script>";
} else {

	$userID = $_SESSION['user_idx'];
	$vote = $_POST['snack']; 
	$mysqli = mysqli_connect("localhost", "team06", "team06","team06"); 
	$sql = "
		UPDATE user_prefer_food_vote SET food_name_id = '".$vote."' WHERE user_idx='".$userID."';
	         ";  //voteModify.php에서 value 값으로 정수 전달
	$result = mysqli_query($mysqli, $sql);
	echo "<script> 
	document.location.href='./voteResult.php'; 
	</script>"; 
	if($result === false){
   		 echo mysqli_error($mysqli);
	}	
}
?>