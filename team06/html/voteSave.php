<?php 

//if (!$_SESSION['user_name']) {
//    	echo "<script> document.location.href='./login.php'; </script>";
//} else { 

	session_start();
	$userID = $_SESSION['user_idx'];
	$vote = $_POST['snack']; 
	$mysqli = mysqli_connect("localhost", "team06", "team06","team06"); 

	// id, user_idx, food_name_id
	// user 테이블에 vote 추가된다면 해당 테이블에도 insert 추가해줘야 
    //vote.php에서 value 값으로 정수 전달
	$sql =  "
		    INSERT INTO user_prefer_food_vote (id, user_idx, food_name_id) VALUES (NULL, '".$userID."','".$vote."' ); 
	         ";  

	$result = mysqli_query($mysqli, $sql); 
	echo "<script> 
	document.location.href='./voteResult.php'; 
	</script>"; 
	if($result === false){
   		 echo mysqli_error($mysqli);
	}
	
//}
//INSERT INTO user_prefer_food_vote (id, user_idx, food_name_id) VALUES (NULL, 20,5 ); 
?>