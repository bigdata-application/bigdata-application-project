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
                    session_start();
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
                    
                </div>
            </div>
            <section class="features">
                <div class="snd_container">
                    
                    <div class= "trd_container">
                        <div class="audienceIcon"></div>
                        <span class="audienceFeature">Commnet Trend</span>
                    </div>
                    
                    </div>

                    <div class = "fourth_container">

                                <div class="row1-1">rank(audience ranking)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> 
                                <div class="row1-2">&nbsp;&nbsp;combination</div>
                    

                        
                                <!--php 출력 코드 나오는 부분 (하드코딩 상태)-->
                        <?php
                            $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

                            $sql= "select b.audience_range, c.nation_name, count(a.id), RANK() OVER (ORDER BY count(id) DESC) rank 
                            from audience_range_comment as a 
                            left join audience_range as b 
                            on a.range_id= b.range_id
                            left join nation as c 
                            on a.nation_id= c.nation_id 
                            group by a.range_id, a.nation_id order by rank;";


                            $result = mysqli_query($mysqli, $sql);
                            $num= mysqli_num_rows($result);

                            while ($rowData= $result->fetch_array()) {
                                $rank=$rowData['rank'];
                                if($rowData['audience_range']==null) {
                                    $audience_range= 'NULL';
                                }
                                else {
                                $audience_range=$rowData['audience_range'];
                                }
                                if($rowData['nation_name']==null) {
                                    $nation_name= 'NULL';
                                }
                                else { 
                                $nation_name= $rowData['nation_name'];
                                }
                                $count=$rowData['count(a.id)'];
                                echo "<span class='dayrow'>$rank&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                                <span class='numrow'>$audience_range+$nation_name($count)</span>";
                            }
                        ?>

                    </div>     

                    <div class = "fourth_container">

                                <div class="row1-1">rank(analysis by genre)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> 
                                <div class="row1-2">&nbsp;&nbsp;combination</div>
                    

                        
                                <!--php 출력 코드 나오는 부분 (하드코딩 상태)-->
                        <?php
                            $mysqli= mysqli_connect("localhost", "team06", "team06", "team06");

                            $sql= "SELECT b.genre_name, c.nation_name, count(a.id), RANK() OVER (ORDER BY count(id) desc) rank 
                            FROM `genre_ranking_by_nation_comment` a
                            left join genre b on  a.genre_id= b.genre_id 
                            left join nation c on
                            a.nation_id= c.nation_id  group by a.genre_id, a.nation_id order by rank;
                            ";
                            
                            $result = mysqli_query($mysqli, $sql);
                            $num= mysqli_num_rows($result);

                            while ($rowData= $result->fetch_array()) {
                                $rank=$rowData['rank'];
                                $genre_name=$rowData['genre_name'];
                                if($rowData['nation_name']==null) {
                                    $nation_name= 'NULL';
                                }
                                else { 
                                $nation_name= $rowData['nation_name'];
                                }
                                $count=$rowData['count(a.id)'];
                                echo "<span class='dayrow'>$rank&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                                <span class='numrow'>$genre_name+$nation_name($count)</span>";
                            }
                        ?>
                    </div>     
                
                
            </section>

        
            <div class="commentInputForm">
                <div class="commentInputForm2">
                   
                        </form>
                </div>
            </div>
        </div> 
    </body>
    </html>