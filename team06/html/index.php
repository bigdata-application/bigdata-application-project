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
                        echo "<button class='headerLoginButton' type='button' onclick='location.href=\""."./trend.php"."\" '>TREND</button>  <button class='headerLoginButton' type='button' onclick='moveLogout()'>LOGOUT</button>";
                    } else { //로그아웃 상태 > 로그인 버튼 출력
                        echo "<button class='headerLoginButton' type='button' onclick='location.href=\""."./trend.php"."\" '>TREND</button>   <button class='headerLoginButton' type='button' onclick='moveLogin()'>LOGIN</button>";
                    }   
                ?>
            </div>
            <section class="middleBanner">
                <span class="title">2022 Korea Box Office Report</span>
            </section>
            <section class="main_features">
                <div class = "main_snd_container">
                    <div class= "main_trd_container">
                        <div class="icon1" onclick='moveFeature1()'></div>
                        <span class="feature1">audience ranking</span>
                    </div>
                    <div class= "trd_container">
                        <div class="icon2" onclick='moveFeature2()'></div>
                        <span class="feature2">analysis by genre</span>
                    </div>
                    <div class= "trd_container">
                        <div class="icon3" onclick='moveFeature3()'></div>
                        <span class="feature3">theater snack vote</span>
                    </div>
                </div>
            </section>
        </div> 
    </body>
    </html>