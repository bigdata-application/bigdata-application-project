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
    ?>
        <div class = "container">
            <section class="middleBanner">
                    <span class="title">2022 Korea Box Office Report</span>
            </section>
            <div class="commentOutputForm">
                <div class="commentOutputForm2">
                    <!--댓글 출력-->
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;username1</div>
                    <div class="commentOutput"> 
                        <span>comment output from database</span>
                    </div>
                    <!--댓글 출력 (하드코딩)-->
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;username2</div>
                    <div class="commentOutput"> 
                        <span>very interesting</span>
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
                                <option value="Korean">Korea</option>
                                <option value="American">USA</option>
                                <option value="Japanese">Japan</option>
                                <option value="other">etc</option>
                            </select>
                            <div>
                                <button class="selectButton" type="submit" value="submit" name="submit" onclick=' moveGenreAndNationList()'> > </button>
                            </div>
                    </form>

                <div class="movieInfoBox">
                    <div class="poster">

                    </div>
                    <div class="info">
                        <p class="boldTitle">(관객수) </p>
                        <p class="infoText">title: </p>
                        <p class="infoText">nation: </p>
                        <p class="infoText">genre: </p>
                        <p class="infoText"> profit: </p>
                    </div>
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
                        <button class="commentButton" type="button"> > </button>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    </html>