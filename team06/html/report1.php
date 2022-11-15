<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
        <link href="./css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="./main.js">var flag=0;</script>
        <title>Document</title>
    </head>
    <body>
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
                    <!--댓글 출력-->

                    <?php //db로부터 댓글 가져오기
                        session_start();
                        $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
                        $sql= "select * from audience_ranking_by_day_comment order by id desc;";//id 내림차순으로 최신순으로 정렬
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

                            if(isset($_SESSION['user_idx']) && $_SESSION['user_idx']==$user_idx) {
                            echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;$user_name</div>
                            <div class='commentOutput'> 
                                <span>$content</span>
                                    <form action='../php/audiencenumbydaycommentdelete.php' method='post' style='display: inline;'>
                                <button class='commentButton' type='submit' style='color: #FF92B1;' name='delete' value=$id> x </button>
                                    </form>
                            <br>
                                    <form action= '../php/audiencenumbydaycommentmodify.php' method= 'post' style='display: inline;' >
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
                    <button class="reportButton1 disabled" type="button" onclick='moveFeature1Report1()'>
                        report <br/> by day of week
                    </button>
                    <div class= "trd_container">
                        <div class="audienceIcon"></div>
                        <span class="audienceFeature">audience ranking</span>
                    </div>
                    <button class="reportButton2" type="button" onclick='moveFeature2Report2()'>
                        report <br/> by film
                    </button>
                    </div>
                    <div class = "fourth_container">
                                <div class="row1-1">day of the week(korea)&nbsp;&nbsp;&nbsp;&nbsp;</div> 
                                <div class="row1-2">&nbsp;&nbsp;the number of audiences</div>
                    

                        
                                <!--php 출력 코드 나오는 부분 (하드코딩 상태)-->
                        <?php
                            $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

                            $sql= "select * , rank() over (order by audience_num desc) as rnk from audience_num_by_day where nation= '한국' ;";
                            
                            $result = mysqli_query($mysqli, $sql);
                            $num= mysqli_num_rows($result);

                            while ($rowData= $result->fetch_array()) {
                                $day=$rowData['day'];
                                $audience_num= $rowData['audience_num'];
                                echo "<span class='dayrow'>$day&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                                <span class='numrow'>&nbsp;&nbsp;$audience_num</span>";
                            }
                        ?>

                    </div>     
                    <div class = "fourth_container">
                                <div class="row1-1">day of the week(foreign)&nbsp;&nbsp;&nbsp;&nbsp;</div> 
                                <div class="row1-2">&nbsp;&nbsp;the number of audiences</div>
                    

                        
                                <!--php 출력 코드 나오는 부분 (하드코딩 상태)-->
                        <?php
                            $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

                            $sql= "select * , rank() over (order by audience_num desc) as rnk from audience_num_by_day where nation= '외국' ;";
                            
                            $result = mysqli_query($mysqli, $sql);
                            $num= mysqli_num_rows($result);

                            while ($rowData= $result->fetch_array()) {
                                $day=$rowData['day'];
                                $audience_num= $rowData['audience_num'];
                                echo "<span class='dayrow'>$day&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                                <span class='numrow'>&nbsp;&nbsp;$audience_num</span>";
                            }
                        ?>
                    </div>     
                    <div class = "fourth_container">
                                <div class="row1-1">day of the week(total)&nbsp;&nbsp;&nbsp;&nbsp;</div> 
                                <div class="row1-2">&nbsp;&nbsp;the number of audiences</div>
                    

                        
                                <!--php 출력 코드 나오는 부분 (하드코딩 상태)-->
                        <?php
                            $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

                            $sql= "select totalrank.day, totalrank.total, rank() over (order by totalrank.total desc) from 
                            (select day, sum(audience_num)total from audience_num_by_day group by day) totalrank;";
                            $result = mysqli_query($mysqli, $sql);
                            $num= mysqli_num_rows($result);

                            while ($rowData= $result->fetch_array()) {
                                $day=$rowData['day'];
                                $audience_num= $rowData['total'];
                                echo "<span class='dayrow'>$day&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                                <span class='numrow'>&nbsp;&nbsp;$audience_num</span>";
                            }
                        ?>
                    </div>     
                
            </section>

        
            <div class="commentInputForm">
                <div class="commentInputForm2">
                    <!--댓글 입력-->
                          

                    <div>+comment&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <form action= "../php/audiencenumbydaycomment.php" METHOD= "post">
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