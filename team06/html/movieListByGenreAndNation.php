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
        $passGenre = $_SESSION['genreValue'];
        //$rangeOption = $_POST['passRange'];
        $nationOption = $_POST['genreNation'];
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
                        
                        $sql= "select * 
                        from GENRE_RANKING_BY_NATION_COMMENT
                        order by id desc;";

                        $res=mysqli_query($mysqli,$sql);

                        while ($rowData= $res->fetch_array()) {
                            $id=$rowData['id'];
                            $user_idx=$rowData['user_idx'];
                            $content= $rowData['content'];

                            $sql2= "select * from user where user_idx=$user_idx";
                            $res2=mysqli_query($mysqli,$sql2);
                            while ($rowData2= $res2->fetch_array()) {
                                $user_name= $rowData2['user_name'];
                            }

                            echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;$user_name</div>
                            <div class='commentOutput'> 
                                <span>$content</span>
                               </div>
                            
                            ";
                        }
    
                    ?>

                   
                </div>
            </div>
            <section class="features">
                <div class="snd_container">
                    <div class= "trd_container">
                        <div class="genreIcon"></div>
                        <?php
                        echo "<span class='genreFeature'> {$passGenre} {$nationOption} movie <br/>audience ranking</span>";
                        ?>
                    </div>
                    </div>

                <div class="movieInfoBox">
                    <div class="poster">

                    </div>
                    <?php
                        
                        $sql = "select * from mv_info where genre='".$_SESSION['genreValue']."' and nation='".$_POST['genreNation']."' order by audience desc;";
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
                                <p class='infoText'>genre: $passGenre </p>
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
                    <div class="commentInput"> 
                        <input class="input" type="text" placeholder="enter comment">
                    </div>
                    <!--댓글 입력 제출 버튼-->
                    <div>
                        <button class="commentButton" type="button"> </button>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    </html>
