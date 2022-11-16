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
        
        if(isset($_GET['genreNation'])) {
            $_SESSION['genreNation'] = $_GET['genreNation'];
        }

        $nationName= $_SESSION['genreNation'];
        $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");
    ?>
        <div class = "container">
            <div class="headerLogin">
                    <?php
                    //session_start();
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
                    <?php 
                        
                        $sql= "select * from GENRE_RANKING_BY_NATION_COMMENT where genre_id= (select genre_id from genre where genre_name='$passGenre') && nation_id=(select nation_id from nation where nation_name='".$_SESSION['genreNation']."') order by id desc;";

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

                            // 해당 댓글의 작성자인 경우 수정과 삭제 기능 표시
                            if(isset($_SESSION['user_idx']) && $_SESSION['user_idx']==$user_idx) {
                                echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;$user_name</div>
                                <div class='commentOutput'> 
                                    <span>$content</span>  
                                        <form action='../php/genrenationrankingcommentdelete.php' method='post' style='display: inline;'>
                                            <button class='commentButton' type='submit' style='color: #FF92B1;' name='delete' value=$id> x </button>
                                        </form>

                                        <form action='../php/genrenationrankingcommentmodify.php' method='post' style='display: inline;'>
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
                    <div class= "trd_container">
                        <div class="genreIcon"></div>
                        <?php
                        $nation= $_SESSION['genreNation'];
                        echo "<span class='genreFeature'> {$nation} {$passGenre}  movie <br/>audience ranking</span>";
                        ?>
                    </div>
                </div>

                <?php
                        $mysqli = mysqli_connect("localhost", "team06", "team06", "team06");

                        if(mysqli_connect_error()){
                          printf("Conncet failed: %s\n", mysqli_connect_error());
                          exit();
                        }else{
                            $sql = "
                            select profit
                            from 
                            (
                            select 
                            case mv_info.nation
                            when '한국' then '한국'
                            when '미국' then '미국'
                            when '일본' then '일본'
                            else 'etc' end as nation_col,
                            case mv_info.genre
                            when '드라마' then '드라마'
                            when  '로맨스' then '로맨스'
                            when '액션' then '액션'
                            when '애니메이션' then '애니메이션'
                            else 'etc' end as genre_col, 
                            case
                            when audience >= 10000000 then 'over 10 million' 
                            when audience <  10000000 and audience >= 5000000 then '5 million ~ 10 million'
                            when audience <  5000000 and audience >= 1000000 then '1 million ~ 5 million'
                            else 'under 1 million' end as audience_col,
                            avg(earned_money) as profit, count(*) as cnt
                            from mv_info 
                            group by  genre_col, nation_col, audience_col 
                            with rollup
                            )V where v.genre_col='".$passGenre."' and v.nation_col='".$nationName."' and v.audience_col is null;
                            ";
                            $res = mysqli_query($mysqli, $sql);
                            if($res){
                                while($result = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                                    $avgProfit = $result['profit']; 
                                    $avgProfit = number_format($avgProfit); 
                                    echo "<div class='avgProfit'>";
                                    echo "<p class='infoText'>평균 매출: {$avgProfit}원 </p>";
                                    echo "</div>";
                                }
                            }

                        }
                    ?>
                    <?php
                        if($_SESSION['genreValue']=='기타장르'&& $_SESSION['genreNation']=='etc') {
                            $sql = "select * from mv_info where genre!='드라마'&&genre!='멜로/로맨스'&&genre!='액션'&&genre!='애니메이션' && nation!='한국'&&nation!='미국'&&nation!='일본' order by audience desc;";    
                        }
                        else if ($_SESSION['genreValue']!='기타장르'&& $_SESSION['genreNation']=='etc') {
                            $sql = "select * from mv_info where genre='".$_SESSION['genreValue']."' && nation!='한국'&&nation!='미국'&&nation!='일본' order by audience desc;";
                        }
                        else if ($_SESSION['genreValue']=='기타장르'&& $_SESSION['genreNation']!='etc') {
                            $sql = "select * from mv_info where genre!='드라마'&&genre!='멜로/로맨스'&&genre!='액션'&&genre!='애니메이션' &&nation='".$_SESSION['genreNation']."' order by audience desc;";
                        }
                        else {
                        $sql = "select * from mv_info where genre='".$_SESSION['genreValue']."' and nation='".$_SESSION['genreNation']."' order by audience desc;";
                        }
                        $res = mysqli_query($mysqli,$sql);

                        $num = mysqli_num_rows($res);
                        if($num>0){
                            while ($movieArray = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
                                $audience = $movieArray['audience'];
                                $audience_10000 = $audience / 10000; 
                                $audience_10000 = floor($audience_10000);
                                $audience_1000 =$audience % 10000; 
                                // $movie_name_eng = $movieArray['movie_name_En'];
                                $movie_name_kor = $movieArray['movie_name_kor'];
                                $nation = $movieArray['nation'];
                                $earned_money = $movieArray['earned_money'];
                                $earned_money = number_format($earned_money); 
                                $res2=mysqli_query($mysqli, "select genre from mv_info where mvcode=$mvcode");//mv_info 테이블로부터 장르명 추출
                                while($mvgenre = mysqli_fetch_array($res2,MYSQLI_ASSOC)){
                                $genre=$mvgenre['genre'];
                                }
                                /*포스터 없는 버전*/
                                echo "<div class = 'movieInfoBox2'>";
                                echo "<div class = 'movieInfoTitle'>";
                                echo "<p class='infoText'> $movie_name_kor </p>";
                                echo "</div>";

                                echo "<div class='movieInfoDetailGrid'>
                                    <p class='movieInfoAudience1'>관객수</p>
                                    <p class='movieInfoAudience2'>{$audience_10000}만 {$audience_1000}명</p>
                                    <p class='movieInfoNation1'>제작</p>
                                    <p class='movieInfoNation2'>$nation</p>
                                    <p class='movieInfoGenre1'>장르</p>
                                    <p class='movieInfoGenre2'>$genre</p>
                                    <p class='movieInfoProfit1'>매출</p>
                                    <p class='movieInfoProfit2'>{$earned_money}원</p>
                                </div>"; //movieInfoDetailGrid
                            }
                        }else{
                                echo "<div class = 'noResult'>";
                                echo "No Result";
                                echo '</div>';
                              }
                    ?>
            </section>
            <div class="commentInputForm">
                <div class="commentInputForm2">
                    <!--댓글 입력-->
                    <div>+comment&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <form action= "../php/genrenationrankingcomment.php" METHOD= "post">
                        <div class="commentInput"> 
                            <input class="input" name= "comment" type="text" placeholder="enter comment">
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