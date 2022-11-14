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
        $genreOption = $_POST['genre'];
        $_SESSION['genreValue'] = $genreOption;
        $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");


    ?>
        <div class = "container">
            <section class="middleBanner">
                    <span class="title">2022 Korea Box Office Report</span>
            </section>
            <div class="commentOutputForm">
                <div class="commentOutputForm2">
                    <!--댓글 출력-->
                    <?php 
                        //session_start();
                        //$mysqli= mysqli_connect("localhost", "team06", "", "team06");
                        $sql= "select * from GENRE_RANKING_COMMENT order by id desc;";
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
                                        <form action='../php/genrerankingcommentdelete.php' method='post' style='display: inline;'>
                                            <button class='commentButton' type='submit' style='color: #FF92B1;' name='delete' value=$id> x </button>
                                        </form>

                                        <form action='../php/genrerankingcommentmodify.php' method='post' style='display: inline;'>
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
            </div>
            <section class="features">
                <div class="snd_container">
                    <div class= "trd_container">
                        <div class="genreIcon"></div>
                        <?php
                        echo "<span class='genreFeature'> {$genreOption} movie<br/> audience ranking</span>";
                        ?>
                    </div>
                </div>
                    <form class="selectBox" method="post" action="./movieListByGenreAndNation.php" >
                            <select name="genreNation" class="nationSelect">
                                <option selected="selected" disabled value="0">Select nation</option>
                                <option value="한국">Korea</option>
                                <option value="미국">USA</option>
                                <option value="일본">Japan</option>
                                <option value="기타">etc</option>
                            </select>
                            <div>
                                <button class="selectButton" type="submit" value="submit" name="submit" onclick=' moveGenreAndNationList()'> > </button>
                            </div>
                    </form>

                <div class="movieInfoBox">
                    <div class="poster">

                    </div>
                    <?php
                        
                        $sql = "select * from mv_info where genre='".$_SESSION['genreValue']."' order by audience desc;";
                        $res = mysqli_query($mysqli,$sql);
                        
                        while ($movieArray = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
                            $audience = $movieArray['audience'];
                            // $movie_name_eng = $movieArray['movie_name_En'];
                            $movie_name_kor = $movieArray['movie_name_kor'];
                            $nation = $movieArray['nation'];
                            $earned_money = $movieArray['earned_money'];

                            echo "<div class='info'>
                                <p class='boldTitle'>(관객수) $audience </p>
                                <p class='infoText'>title: $movie_name_kor </p>
                                <p class='infoText'>nation: $nation </p>
                                <p class='infoText'>genre: $genreOption </p>
                                <p class='infoText'> profit: $earned_money </p>
                                </div>";
                        }
                        



                    ?>

                    
                </div>
            </section>
            <div class="commentInputForm">
                <div class="commentInputForm2">
                    <!--댓글 입력-->
                    <div>+comment&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <form action= "../php/genrerankingcomment.php" METHOD= "post">
                        <div class="commentInput"> 
                            <input class="input" name="comment" type="text" placeholder="enter comment">
                        </div>
                        <!--댓글 입력 제출 버튼-->
                        <div>
                            <button class="commentButton" type="submit">submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </body>
    </html>