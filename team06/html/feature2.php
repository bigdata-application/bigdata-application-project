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
                    <span class="title" onClick="main()">2022 Korea Box Office Report</span>
            </section>
            <section class="features">
                <div class="snd_container">
                    <div class= "trd_container">
                        <div class="genreIcon"></div>
                        <span class="genreFeature">analysis by genre</span>
                    </div>   
                </div>
                    <form class="selectBox" method="get" action="./movieListByGenre.php" >
                        <select name="genre" class="genreSelect">
                            <option selected="selected" disabled value="0">Select genre</option>
                            <option value="드라마">드라마</option>
                            <option value="멜로/로맨스">로맨스</option>
                            <option value="액션">액션</option>
                            <option value="애니메이션">애니메이션</option>
                        </select>
                        <div>
                            <button class="selectButton" type="submit" value="submit" name="submit" onclick='moveGenreList()'> > </button>
                        </div>
                    </form>  
            </section>  
        </div> 
    </body>
    </html>