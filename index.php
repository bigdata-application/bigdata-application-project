<?php

/*
   $key = "4ee630aaf57670e901aa6417f5677ae3";
   $url = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieInfo.json?key=".$key."&movieCd=stripslashes($str)";

   $jsonString = file_get_contents($url);
   $data = json_decode($jsonString, true);


   
   var_dump($data);
*/

/*
   /장르 json test
   for($i=0; $i<count($data["movieInfoResult"]["movieInfo"]["genres"]); $i++) {
    foreach ($data["movieInfoResult"]["movieInfo"]["genres"][$i] as $key => $val) {
            echo "$val<br/>"; 
      if($i==0) {
          $genreNm=$val;
      }
    }
}
*/




    $mysqli= mysqli_connect("localhost", "root","","bigdataapplication");
    
    if(mysqli_connect_errno()) {
        printf("db연결 실패");
    }

    else {//db연결 성공

    //print("연결 성공");
    $sql = "select * from mv_info";
    $resultAll = mysqli_query($mysqli, $sql);
    if(!$resultAll){
        die(mysqli_error($sql));
    }
    
    if (mysqli_num_rows($resultAll) > 0) {
        while($rowData = mysqli_fetch_array($resultAll)){
            $mvcode = $rowData["mvcode"];
            $movie_name_kor = $rowData["movie_name_kor"];
            $earned_money = $rowData["earned_money"];
            $audience = $rowData["audience"];
            $genre = $rowData["genre"];
            $movie_name_En = $rowData["movie_name_En"];
            $nation = $rowData["nation"];

            echo "insert into mv_info(mvcode, movie_name_kor, earned_money,audience, nation, genre, movie_name_En) 
            values ($mvcode, '$movie_name_kor', $earned_money, $audience,'$nation', '$genre', '$movie_name_En');"."<br/>";
        }
    }
}

    /*
    $sql = "select * from mv_info";
    $resultAll = mysqli_query($mysqli, $sql);
    if(!$resultAll){
        die(mysqli_error($sql));
    }
    
    if (mysqli_num_rows($resultAll) > 0) {
        while($rowData = mysqli_fetch_array($resultAll)){

              
              echo '<br>'.$rowData["mvcode"].'<br>';
              $mvcode=$rowData["mvcode"];
              $url = "http://www.kobis.or.kr/kobisopenapi/webservice/rest/movie/searchMovieInfo.json?key=4ee630aaf57670e901aa6417f5677ae3&movieCd=".$mvcode;
              $jsonString = file_get_contents($url);
              $data = json_decode($jsonString, true);
              
              
              if($mvcode== 20135304) {
                  echo $jsonString;
              }

            
              //$genre= $data["movieInfoResult"]["movieInfo"]["genres"][0];
/*
              $genreNm="default";
              for($i=0; $i<count($data["movieInfoResult"]["movieInfo"]["genres"]); $i++) {
              foreach ($data["movieInfoResult"]["movieInfo"]["genres"][$i] as $key => $val) {
                      echo "$val<br/>"; 
                if($i==0) {
                    $genreNm=$val;
                }
              }
          }
          
*/
          
/*           
$var = $data["movieInfoResult"]["movieInfo"]["movieNmEn"];

            $var= addslashes($var);
        
            $sql2="UPDATE mv_info SET movie_name_En = '$var' WHERE mvcode = $mvcode";
        

            //"update messages set writer='$writer', message='$message',"."wdate=sysdate() where seq='$seq'";

            echo $sql2;
            mysqli_query($mysqli, $sql2);

            
}
        
    
}
    
    }




    /*
$genre= $data["movieInfoResult"]["movieInfo"]["genres"][0];

    for($i=0; $i<count($data["movieInfoResult"]["movieInfo"]["genres"]); $i++) {
    foreach ($data["movieInfoResult"]["movieInfo"]["genres"][$i] as $key => $val) {
        
            echo "$val<br/>"; 
                        
    }
    
}
*/

?>

