<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <link href="./css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="./main.js"></script>
        <title>Document</title>
    </head>
    <body>
    <?php
        session_start();
        $passRange = $_SESSION['rangeValue'];
        $rangeOption= $passRange; 

        $nationOption = $_POST['nationValue'];
    
        

    ?>
        <div class = "container">
            <section class="middleBanner">
                    <span class="title">2022 Korea Box Office Report</span>
            </section>
            <div class="commentOutputForm">
                <div class="commentOutputForm2">
                <?php
                        session_start();
                        $mysqli = mysqli_connect("localhost", "team06", "team06", "team06");
                        $sql = "select * from audience_range_nation_comment order by id desc;";
                        $result=mysqli_query($mysqli,$sql);
                        while ($rowData= $result->fetch_array()) {
                            $id=$rowData['id'];
                            $user_idx=$rowData['user_idx'];
                            $sql2= "select * from user where user_idx=$user_idx";
                            $result2=mysqli_query($mysqli,$sql2);
                            while ($rowData2= $result2->fetch_array()) {//username추출
                                $user_name= $rowData2['user_name'];
                            }
                            $content= $rowData['content'];

                            if($_SESSION['user_idx']==$user_idx) {
                            echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;$user_name</div>
                            <div class='commentOutput'> 
                                <span>$content</span>
                                    <form action='../php/rankbynumnationcommentdelete.php' method='post' style='display: inline;'>
                                <button class='commentButton' type='submit' style='color: #FF92B1;' name='delete' value=$id> x </button>
                                    </form>
                            <br>
                                    <form action= '../php/rankbynumnationcommentmodify.php' method= 'post' style='display: inline;' >
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
                        echo "<span class='audienceFeature'> {$passRange} <br/> {$nationOption} movie <br/> audience ranking</span>";
                        ?>
                    </div>
                    <button class="reportButton2 disabled" type="button" onclick='moveFeature2Report2()'>
                        report <br/> by film
                    </button>
                    </div>

                <?php
                        header('Content-Type: text/html; charset=utf-8');
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

                          $nation_condition = "";
                          if ($nationOption == 'Korean') $nation_condition = "nation = '한국'";
                          if ($nationOption == 'American') $nation_condition = "nation = '미국'";
                          if ($nationOption == 'Japanese') $nation_condition = "nation = '일본'";
                          if ($nationOption == 'other') $nation_condition = "nation = '기타'";

                          $sql = "SELECT audience, movie_name_kor, nation, genre, earned_money 
                              from mv_info where $condition and $nation_condition order by audience desc";
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
            </section>
            <div class="commentInputForm">
                <div class="commentInputForm2">

                    <!--댓글 입력-->
                    <div>+comment&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <form action= "../php/rankbynumnationcomment.php" METHOD= "post">
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