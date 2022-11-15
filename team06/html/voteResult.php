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
            <div class="headerLogin">
                    <?php
                        session_start();
                        if (isset($_SESSION['user_name'])) {//로그인 상태 > 로그아웃 버튼 출력
                            echo "<button class='headerLoginButton' type='button' onclick='moveLogout()'>LOGOUT</button>";
                        } else { //로그아웃 상태 > 로그인 버튼 출력
                            echo "<button class='headerLoginButton' type='button' onclick='moveLogin()'>LOGIN</button>";
                        }   
                    ?>
            </div>
            
            <section class="middleBanner">
                    <span class="title" onclick='main()'>2022 Korea Box Office Report</span>
            </section>
            <div class="commentOutputForm">
                <div class="commentOutputForm2">
                    <!--댓글 출력-->

                    <?php 
                        $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
                        $sql= "select * from prefer_food_ranking_comment order by id desc;";
                        $res=mysqli_query($mysqli,$sql);
                        while ($rowData= $res->fetch_array()) {
                            $id=$rowData['id'];
                            $user_idx=$rowData['user_idx'];
                            $sql2= "select * from user where user_idx=$user_idx";
                            $res2=mysqli_query($mysqli,$sql2);
                            while ($rowData2= $res2->fetch_array()) {
                                $user_name= $rowData2['user_name'];
                            }
                            $content= $rowData['content'];


                            // 해당 댓글의 작성자인 경우 수정과 삭제 기능 표시
                            if($_SESSION['user_idx']==$user_idx) {
                                echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;$user_name</div>
                                <div class='commentOutput'> 
                                    <span>$content</span>  
                                        <form action='../php/votecommentdelete.php' method='post' style='display: inline;'>
                                            <button class='commentButton' type='submit' style='color: #FF92B1;' name='delete' value=$id> x </button>
                                        </form>
                                        <form action='../php/votecommentmodify.php' method='post' style='display: inline;'>
                                            <div class='commentInput' style='margin-left: -8px; padding: -8px;'> 
                                                <input class='input' name= 'modify' type='text' placeholder='enter comment'>
                                            </div>          
                                            <input type='hidden' name='id' value=$id>
                                            <button class='commentButton' type='submit' style='color: #C8FAC8;' style='display: inline;'> modify </button>
                                        </form>
                                    </div>
                                   
                                ";
                            }
                            else {
                                echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;$user_name</div>
                                <div class='commentOutput'> 
                                    <span>$content</span>
                                   </div>
                                
                                ";
                            }

                        }
                       
                    ?>
                </div>
            </div>
           <section class="voteFeature"> 
                <div class="vote_snd_container"> 
                    <!--<div class= "trd_container"> -->
                        <div class="snackIcon"></div>
                        <p class="snackFeature"> theater snack vote result</p>
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
                        $mysqli = mysqli_connect("localhost", "team06", "team06","team06"); 
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
                    //session_start();
                    if (isset($_SESSION['user_name'])) {//투표 참여
                        $userID = $_SESSION['user_idx'];
                        $mysqli = mysqli_connect("localhost", "team06", "team06","team06"); 
                        $sql = "
                            SELECT EXISTS (SELECT ID FROM user_prefer_food_vote WHERE user_idx='".$userID."' limit 1) as success;
                                ";  //SQL문 변수 사용 가능 여부 확인
                        $result = mysqli_query($mysqli, $sql); 
                        $row = $result->fetch_array();
                        $voted = $row["success"];
                        if($result === false){ //에러 발생
                                echo mysqli_error($mysqli);
                        }else if($voted){ //로그인 사용자가 투표에 이미 참여했을 경우
                                echo "<button class='voteButton' type='button' onclick='modifyVote()'>
                                                MODIFY </button>";
                                echo "<form action='voteDelete.php' method='post'> <button class='voteButton' type='submit' onclick='deleteVote()' >
                                                DELETE </button> </form>";
                        }else if(!$voted){  //로그인 사용자가 투표에 참여하지 않았을 경우
                                                echo "<button class='onlyVoteButton' type='button' onclick='vote()'>
                                                VOTE </button>"; 
                        }
                    } else {
                        echo "<button class='onlyVoteButton' type='button' onclick='cannotVote()'>
                        VOTE </button>";
                        }
                    
                    ?>

                </div>
            </div>
            <div class="commentInputForm">
                <div class="commentInputForm2">
                        <!--댓글 입력-->
                        <div>+comment&nbsp;&nbsp;&nbsp;&nbsp;</div>

                        <form action= "../php/votecomment.php" METHOD= "post">
                            <div class="commentInput"> 
                                <input class="input" type="text" placeholder="enter comment">
                            </div>
                            <!--댓글 입력 제출 버튼-->
                            <div>
                                <button class="commentButton" type="submit" > > </button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </body>
    </html>
