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
                        <div class="snackIcon"></div>
                        <span class="snackFeature"> theater snack vote result</span>
                    </div>   
                </div> 
            </section>
            <!--php문--> 
            <div class="vote_container">
                <form  class="voteCheckBox" method="post" action="voteSave.php">
                    <label><input type="checkbox" name="snack" value="1" onclick="clickCheck(this)"> sweetpopcorn</label>
                    <br/>
                    <label><input type="checkbox" name="snack" value="2" onclick="clickCheck(this)"> cheesepopcorn</label>
                    <br/>
                    <label><input type="checkbox" name="snack" value="3" onclick="clickCheck(this)"> nachos</label>
                    <br/>
                    <label><input type="checkbox" name="snack" value="4" onclick="clickCheck(this)"> hotdog</label>
                    <br/>
                    <label><input type="checkbox" name="snack" value="5" onclick="clickCheck(this)"> squid</label>
                    <br/>
                    <button class="voteSubmitButton" type="submit" onclick='voteSubmit()'>
                        SUBMIT
                    </button>
                </form>
            </div>
           
        </div>
    </body>
    </html>
