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
               
                <!--아래 selectBox 선택값 다음 페이지에 전달하는 php 코드
                    <form action="rangeSelect.php" method="post">
                    </form>
                    //rangeSelect.php -> 목록 출력 / 타이틀 value 값으로 고정
                    $range = $_POST["range"]; 
                -->
                
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
  
        </div> 
    </body>
    </html>