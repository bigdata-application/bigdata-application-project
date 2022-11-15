<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <link href="./css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="./main.js"></script>
        <title>Document</title>
    </head>
    <body>
    <?php
        session_start();
        $rangeOption = $_POST['audRange'];
        $_SESSION['rangeValue'] = $rangeOption;
    ?>
        <div class = "container">
        <div class="headerLogin">
                <?php
                    if (isset($_SESSION['user_name'])) {//로그인 상태 > 로그아웃 버튼 출력
                        echo "<button class='headerLoginButton' type='button' onclick='moveLogout()'>LOGOUT</button>";
                    } else { //로그아웃 상태 > 로그인 버튼 출력
                        echo "<button class='headerLoginButton' type='button' onclick='moveLogin()'>LOGIN</button>";
                    }   
                ?>
            </div>
            <section class="middleBanner">
                    <span class="title" onClick="main()">2022 Korea Box Office Report</span>
            </section>
            <div class="commentOutputForm">
                <div class="commentOutputForm2">
                    <!-- 댓글 출력 -->
                    <?php //db로부터 댓글 가져오기
                        $mysqli = mysqli_connect("localhost", "team06", "team06", "team06");
                        $sql = "select * from audience_range_comment order by id desc;";
                        $result=mysqli_query($mysqli,$sql);
                        while ($rowData= $result->fetch_array()) {
                            $id=$rowData['id'];
                            $user_idx=$rowData['user_idx'];
                            $sql2= "select * from user where user_idx=$user_idx";
                            $result2=mysqli_query($mysqli,$sql2);
                            while ($rowData2= $result2->fetch_array()) {
                                $user_name= $rowData2['user_name'];
                            }
                            $content= $rowData['content'];

                            if(isset($_SESSION['user_idx']) && $_SESSION['user_idx']==$user_idx) {
                            echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;$user_name</div>
                            <div class='commentOutput'> 
                                <span>$content</span>
                                    <form action='../php/rankbynumcommentdelete.php' method='post' style='display: inline;'>
                                <button class='commentButton' type='submit' style='color: #FF92B1;' name='delete' value=$id> x </button>
                                    </form>
                            <br>
                                    <form action= '../php/rankbynumcommentmodify.php' method= 'post' style='display: inline;' >
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
                               </div>";
                        }
                    }
                
                    ?>
                </div>
            </div>
            <section class="features">
                <div class="snd_container">
                    <button class="reportButton1" type="button" onclick='moveFeature1Report1()'>
                        report <br/> by day of week
                    </button>
                    <div class= "trd_container">
                        <div class="audienceIcon"></div>
                        <?php
                        echo "<span class='audienceFeature'> {$rangeOption} <br/> audience ranking</span>";
                        ?>
                    </div>
                    <button class="reportButton2 disabled" type="button" onclick='moveFeature2Report2()'>
                        report <br/> by film
                    </button>
                    </div>
                    <form class="selectBox" method="post" action="./movieListByRangeAndNation.php" >
                            <select name="nationValue" class="nationSelect"> 
                                <!--원래 name = "nation"-->
                                <option selected="selected" disabled value="0">Select nation</option>
                                <option value="Korean">Korea</option>
                                <option value="American">USA</option>
                                <option value="Japanese">Japan</option>
                                <option value="other">etc</option>
                            </select>
                            <div>
                                <button class="selectButton" type="submit" value="submit" name="submit" onclick='moveRangeAndNationList()'> > </button>
                            </div>
                    </form>
                    <form name="passInfo" method="post" action="./movieListByRangeAndNation.php">
                        <input type = "hidden" value="<?php echo $_POST['audRange']; ?>" name = "passRange">
                    </form>

                    <?php
                        $mysqli = mysqli_connect("localhost", "team06", "team06", "team06");

                        if(mysqli_connect_error()){
                          printf("Conncet failed: %s\n", mysqli_connect_error());
                          exit();
                        }else{
                          $condition = "";
                          if ($rangeOption == 'over 10 million') $condition = "audience >= 10000000";
                          if ($rangeOption == '5 ~ 10 million') $condition = "audience < 10000000 and audience >= 5000000";
                          if ($rangeOption == '1 ~ 5 million') $condition = "audience < 5000000 and audience >= 1000000"; 
                          if ($rangeOption == 'under 1 million') $condition = "audience < 1000000";

                          $sql = "SELECT audience, movie_name_kor, nation, genre, earned_money 
                              from mv_info where $condition order by audience desc";
                              $res = mysqli_query($mysqli, $sql);
                              
                              if($res){
                                while($result = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                                  $audience = $result['audience'];
                                  $movie_name_kor = $result['movie_name_kor'];
                                  $nation = $result['nation'];
                                  $genre = $result['genre'];
                                  $earned_money = $result['earned_money'];

                                  echo '<div class = "movieInfoBox">';
                                  //echo '<div class = "info">';

                                  echo '<div class = "poster">';

                                  echo '</div>';

                                  echo '<div class = "info">';
                                  echo '<p class="infoText">(관객 수):' .$audience.' </p>';
                                  echo '<p class="infoText">title:' .$movie_name_kor.' </p>';
                                  echo '<p class="infoText">nation:' .$nation.' </p>';
                                  echo '<p class="infoText">genre: '.$genre.' </p>';
                                  echo '<p class="infoText">profit: '.$earned_money.' </p>';
                                  echo '</div>';
                                  
                                  echo '</br>';

                                  //echo '</div>'; //info 닫기
                                  echo '</div>'; //movieInfoBox 닫기
                                }
                              }
                        }
                        
                      ?>
                    <!-- </div> -->

                <!-- </div> -->
            </section>
            <div class="commentInputForm">
                <div class="commentInputForm2">

                    <!--댓글 입력-->
                    <div>+comment&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <form action= "../php/rankbynumcomment.php" METHOD= "post">
                    <div class="commentInput"> 
                        <input class="input" name = "comment" type="text" placeholder="enter comment">
                    </div>
                    <!--댓글 입력 제출 버튼-->
                    <div>
                        <button class="commentButton" type="submit"> > </button>
                    </div>
                        </form>
                </div>
            </div>
        </div> 
    </body>
    </html>