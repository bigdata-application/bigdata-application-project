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

                    <?php //db로부터 댓글 가져오기
                        session_start();
                        $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
                        $sql= "select * from audience_comment order by id desc;";//id 내림차순으로 최신순으로 정렬
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
                                    <form action='../php/audiencecommentdelete.php' method='post' style='display: inline;'>
                                <button class='commentButton' type='submit' style='color: #FF92B1;' name='delete' value=$id> x </button>
                                    </form>
                            <br>
                                    <form action= '../php/audiencecommentmodify.php' method= 'post' style='display: inline;' >
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
            <section class="features">
                <div class="snd_container">
                    <button class="reportButton1" type="button" onclick='moveFeature1Report1()'>
                        report <br/> by day of week
                    </button>
                    <div class= "trd_container">
                        <div class="audienceIcon"></div>
                        <span class="audienceFeature">audience ranking</span>
                    </div>   
                    <button class="reportButton2 disabled" type="button" onclick='moveFeature2Report2()' >
                        report <br/> by film
                    </button>
                </div>
                
                <?php
                        $mysqli = mysqli_connect("localhost", "team06", "team06", "team06");

                        if(mysqli_connect_error()){
                          printf("Conncet failed: %s\n", mysqli_connect_error());
                          exit();
                        }else{

                          $sql = "SELECT audience, movie_name_kor, nation, genre, earned_money 
                              from mv_info order by audience desc";
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
                


                    <form class="selectBox" method="post" action="./movieListByRange.php" >
                        <select name="audRange" class="rangeSelect">
                            <option selected="selected" disabled value="0">Select range</option>
                            <option value="over 10 million">over 10 million</option>
                            <option value="5 ~ 10 million">5 ~ 10 million</option>
                            <option value="1 ~ 5 million">1 ~ 5 million</option>
                            <option value="under 1 million">under 1 million</option>
                        </select>
                        <div>
                            <button class="selectButton" type="submit" value="submit" name="submit" onclick='moveRangeList()'> > </button>
                        </div>
                    </form>


            </section>
  
            <div class="commentInputForm">
                <div class="commentInputForm2">
                    <!--댓글 입력-->
                          

                    <div>+comment&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <form action= "../php/audiencecomment.php" METHOD= "post">
                    <div class="commentInput"> 
                        <input class="input" name= "comment" type="text" placeholder="enter comment">
                    </div>
                    <!--댓글 입력 제출 버튼-->
                    <div>
                        <button class="commentButton" type="submit"> > </script> </button> 
                    </div>
                        </form>
                </div>
            </div>
        </div> 
    </body>
    </html>