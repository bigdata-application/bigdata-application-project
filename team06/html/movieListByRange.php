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
        $rangeOption = $_POST['audRange'];
        $_SESSION['rangeValue'] = $rangeOption;
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
                    <button class="reportButton1" type="button" onclick='moveFeature1Report1()'>
                        report <br/> by day of week
                    </button>
                    <div class= "trd_container">
                        <div class="audienceIcon"></div>
                        <?php
                        echo "<span class='audienceFeature'> {$rangeOption} <br/> audience ranking</span>";
                        ?>
                    </div>
                    <button class="reportButton2 disabled" type="button" onclick='moveFeature2Report2()'>
                        report <br/> by film
                    </button>
                    </div>
                    <form class="selectBox" method="post" action="./movieListByRangeAndNation.php" >
                            <select name="nation" class="nationSelect">
                                <option selected="selected" disabled value="0">Select nation</option>
                                <option value="Korean">Korea</option>
                                <option value="American">USA</option>
                                <option value="Japanese">Japan</option>
                                <option value="other">etc</option>
                            </select>
                            <div>
                                <button class="selectButton" type="submit" value="submit" name="submit" onclick='moveRangeAndNationList()'> > </button>
                            </div>
                    </form>
                    <form name="passInfo" method="post" action="./movieListByRangeAndNation.php">
                        <input type = "hidden" value="<?php echo $_POST['audRange']; ?>" name = "passRange">
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