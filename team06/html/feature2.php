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
                    <div class= "trd_container">
                        <div class="genreIcon"></div>
                        <span class="genreFeature">analysis by genre</span>
                    </div>   
                </div>
                    <form class="selectBox" method="post" action="./movieListByGenre.php" >
                        <select name="genre" class="genreSelect">
                            <option selected="selected" disabled value="0">Select genre</option>
                            <option value="드라마">드라마</option>
                            <option value="로맨스">로맨스</option>
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