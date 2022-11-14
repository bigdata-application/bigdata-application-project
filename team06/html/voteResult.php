<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <link href="./css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="./main.js"></script>
        <title>Document</title>
    </head>
    <body>
        <div class = "container">
            <section class="middleBanner">
                    <span class="title">2022 Korea Box Office Report</span>
            </section>
            <div class="commentOutputForm">
                <div class="commentOutputForm2">
                    <!--댓글 출력-->
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;username1</div>
                    <div class="commentOutput"> 
                        <span>comment output from database</span>
                    </div>
                    <!--댓글 출력 (하드코딩)-->
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;username2</div>
                    <div class="commentOutput"> 
                        <span>very interesting</span>
                    </div>
                </div>
            </div>
           <section class="voteFeature"> 
                <div class="vote_snd_container"> 
                    <!--<div class= "trd_container"> -->
                        <div class="snackIcon"></div>
                        <span class="snackFeature"> theater snack vote result</span>
                    <!--</div>   -->
                </div> 
            </section> 
            <!--php문--> 
            <div class="vote_result_container">
                <div class="voteResult">
                   <!-- <p>1.sweetpopcorn</p>
                    <p>2.cheesepopcorn</p>
                    <p>3.nachos</p>
                    <p>4.hotdog</p>
                    <p>5.squid</p> -->
                    <?php
                        session_start(); 
                        $mysqli = mysqli_connect("localhost", "root", "","team06"); 
                        $sql = "
                            SELECT food_name,
                            COUNT(food_name_id) AS cnt 
                            FROM 
                            (
                            SELECT user_prefer_food_vote.food_name_id, food_name_list.food_name  
                            FROM user_prefer_food_vote INNER JOIN food_name_list
                            ON user_prefer_food_vote.food_name_id=food_name_list.id
                            ) V
                            GROUP BY v.food_name
                            ORDER BY cnt DESC;
                                    ";
                        $result = mysqli_query($mysqli, $sql); 
                        $num = 0;  
                        while($ranking=$result->fetch_array()){
                            $num = $num+1; 
                            $name = $ranking['food_name'];
                            echo "<p> $num. $name  </p>"; 
                        }
                    ?>
                </div>
                <div class="voteButtonDiv">
                    <!--php 적용 전<button class="voteButton" type="button" onclick='vote()'>
                            VOTE
                    </button> -->
                    <?php
                    session_start();
                    if (!$_SESSION['user_name']) {//투표 참여
                            echo "<button class="voteButton" type="button" onclick='cannotvote()'>
                                                VOTE </button>";
                    } else {
                        $userID = $_SESSION['user_idx'];
                        $mysqli = mysqli_connect("localhost", "root", "","team06"); 
                        $sql = "
                            SELECT EXISTS (SELECT ID FROM  where table user_prefer_food_vote='".$userID."' limit 1) as success;
                                ";  //SQL문 변수 사용 가능 여부 확인
                        $result = mysqli_query($mysqli, $sql); 
                        $row = $result->fetch_array();
                        $voted = $row["success"];
                            echo '<script>';
                            echo 'console.log("voted 변수: ")';	
                            echo 'console.log("'.$voted.'")';
                            echo '</script>';
                        if($result === false){ //에러 발생
                                echo mysqli_error($mysqli);
                        }else if($voted){ //로그인 사용자가 투표에 이미 참여했을 경우
                                echo "<button class="voteButton" type="button" onclick='modifyVote()'>
                                                MODIFY </button>";
                                echo "<form action="voteDelete.php" method="post"> <button class="voteButton" type="submit" onclick='deleteVote()'>
                                                DELETE </button> </form>";
                        }else if(!$voted){  //로그인 사용자가 투표에 참여하지 않았을 경우
                                                echo "<button class="voteButton" type="button" onclick='vote()'>
                                                VOTE </button>"; 
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="commentInputForm">
                    <div class="commentInputForm2">
                        <!--댓글 입력-->
                        <div>+comment&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="commentInput"> 
                            <input class="input" type="text" placeholder="enter comment">
                        </div>
                        <!--댓글 입력 제출 버튼-->
                        <div>
                            <button class="commentButton" type="button"> > </button>
                        </div>
                    </div>
            </div>
        </div>
    </body>
    </html>
