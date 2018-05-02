<html>
<head><link rel="stylesheet" type="text/css"href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:300" rel="stylesheet">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="./w3.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="scripts.js"></script>

    </head>
<body>
    <audio id="bg_audio" loop >
  <source src="./bg_audio_mp3.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
    <div id="myNav_search" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav();">&times;</a>
  <div class="overlay-content">
    <form method="post" action="search.php"><div class="search_menu_title"></div><br><br>
  <input class="search_box" type="text" name="search" placeholder="Search Products . . ."><br><br>
         <button type="submit" class="btn search_submit">
      <span class="glyphicon glyphicon-search"></span> Search
    </button>
    <br> 
</form>
      
      <div class="image_search_container">
          <form></form>
        </div>  
      
  </div>
</div>
     <div id="myNav_menu" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
      <a href="#"><span id="play_btn" onclick="pauseAudio()" class="play_btn glyphicon glyphicon-volume-off"></span></a>
    <a href="#">Find Trends</a>
      <a href="#">Sign-In</a>
    <a href="#">Sign-Up</a>
  </div>
</div>
    <div class="main_content">
    <div class="wrap " id="hero_image">
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand brand" href="index.php"><b>HETVI_MODA</b></a>
      </div>
      <ul class="navbar-brand nav navbar-nav navbar-right">
        <li><span style="font-size:1em;cursor:pointer" onclick="openNav_search()">Search<span class="glyphicon glyphicon-search" style="font-size:1em;"></span></span></li>
          <li></li>
     <li><span style="font-size:1em;cursor:pointer" onclick="openNav_menu()">Menu&#9776;</span></li>
          <li></li>
      </ul>
  </div>
</nav>  <div class="bg w3-animate-opacity" id="hero_image2" ></div>
  <div class="center_hero_text"><br>...<br>Summer '18<br>COllection<br>#hetvijeans<br>...</div>
    <div class="container-fluid">
        <div  class="col-sm-2">
 <div class="vertical-center1" >
  <div class="container">
      
          <ul class="list_category" type="none">
              <li onmouseover="setBackground(0)" onmouseout="resume_bg_change_interval()" class="shop_select_home">SHOP</li>
              <li><a onmouseover="setBackground(1)" onmouseout="resume_bg_change_interval()" href="#" class="trends_select_home" >_TRENDS</a></li>
              <li onmouseover="setBackground(2)" onmouseout="resume_bg_change_interval()"><a href="#" id="men_select_home" class="men_select_home">_MEN</a><br>
              </li>
              <li onmouseover="setBackground(3)" onmouseout="resume_bg_change_interval()"><a href="#" id="women_select_home" class="women_select_home">_WOMEN</a></li>
      </ul>

  </div>
</div>
        </div>
         <div class="col-sm-8">
</div>
        </div>
        <div  class="col-sm-2">
       
        </div>
<br> </div>
</div> 
        
        
    
    
    
    
    </body>
    <script>
         var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        
        var bg_audio = document.getElementById("bg_audio"); 
       var is_audio_playing = false;
        
        // If it is a mobile phone, audio will not autoplay
        if(width < 650){
        bg_audio.pause();
            var is_audio_playing = false;
         //   document.getElementById("play_btn").style.display = "none";
         document.getElementById("play_btn").className = "glyphicon glyphicon-user glyphicon-volume-off";
        }
        
        function pauseAudio(){
            if(is_audio_playing){
            bg_audio.pause();
            document.getElementById("play_btn").className = "glyphicon glyphicon-user glyphicon-volume-off";
             is_audio_playing = false;
            }else{
                bg_audio.play();
                            document.getElementById("play_btn").className = "glyphicon glyphicon-volume-up";
               is_audio_playing = true; 
            }   
        }
    
    var img_count=2;
    var bg_urls = ["jeans_zara.jpg","mens_bg.jpg","join_zara.jpg","man_2.jpg","pdp.jpg", "womens_joe.jpg"];
        
        var bg_urls_select = ["jeans_zara.jpg","dress_zara.jpg","mens_bg.jpg","ready_zara.jpg"];
        
        function setBackgroundImg(x){
            if(img_count==bg_urls.length-1){
                img_count=0;
            }
            document.getElementById("hero_image2").style.background="url('./images/bannes/"+bg_urls[x]+"') no-repeat center center";
            document.getElementById("hero_image2").style.backgroundSize="cover";
           img_count +=1;
        }
        
var bg_change_interval =  setInterval(function(){setBackgroundImg(img_count)}, 5000);

        function setBackground(x){
           clearInterval(bg_change_interval); document.getElementById("hero_image2").style.background="url('./images/bannes/"+bg_urls_select[x]+"') no-repeat center center";
            document.getElementById("hero_image2").style.backgroundSize="cover";
        }
        
        function resume_bg_change_interval(){
        bg_change_interval =  setInterval(function(){setBackgroundImg(img_count)},5000);
        }
        
        
    </script>
    
</html>