<?php 
/* 세션 주석 session_start(); 
if (!$_SESSION['user_name']) {
    	echo "<script> document.location.href='./login.php'; </script>";
} else { */

	//세션 주석 $userID = $_SESSION['user_idx'];
    $userID = 20; // 임시
	$vote = $_REQUEST['snack']; 
	$mysqli = mysqli_connect("localhost", "root", "","team06"); 

	// id, user_idx, food_name_id
	// user 테이블에 vote 추가된다면 해당 테이블에도 insert 추가해줘야 
    //vote.php에서 value 값으로 정수 전달
	$sql =  "
		    INSERT INTO user_prefer_food_vote (id, user_idx, food_name_id) VALUES (NULL, '". $userID."'','". $vote."' ); 
	         ";  
            
	$result = mysqli_query($mysqli, $sql); 
	if($result === false){
   		 echo mysqli_error($mysqli);
	}
	
//세션 주석}
?>