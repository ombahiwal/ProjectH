<?php
include("database_handler.php");
$session_set =0;
if(isset($_SESSION['user_id'])){
$session_set = 1;
}
?>

<head>
    <link rel="stylesheet" type="text/css"href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:300" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
    <link href="https://fonts.googleapis.com/css?family=Covered+By+Your+Grace" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="./w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="scripts.js"></script>
    
<title>HETVI - Fashion for Youth</title>    
<link rel="apple-touch-icon" sizes="57x57" href="./favicon.ico/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="./favicon.ico/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="./favicon.ico/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="./favicon.ico/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="./favicon.ico/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="./favicon.ico/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="./favicon.ico/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="./favicon.ico/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="./favicon.ico/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="./favicon.ico/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="./favicon.ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="./favicon.ico/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="./favicon.ico/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="./favicon.ico/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    
    
    </head>

    <audio id="bg_audio" loop >
  <source src="./bg_audio_mp3.mp3" type="audio/mpeg">
<!-- No Support for Audio Elements -->
</audio>
    
    
    

    
    <!-search nav>
    <div id="myNav_search" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav();">&times;</a>
  <div class="overlay-content">
      
    <form method="post" action="./image_search_app/search.php" enctype="multipart/form-data">
        <div class="search_menu_title">Search Products</div><br><br>
  <input class="search_box" type="text" name="search" placeholder="Search products . . ."><h3 style="color:white;font-family: 'Dosis', sans-serif;">OR</h3>
        <label style="font-size:2rem;diplay:block;padding:20px;color:white;" for="file-upload" class="file_upload_label">
    <i class="fa fa-cloud-upload"></i> Upload Image
</label><br>
         <button type="submit" name="search_submit" class="btn search_submit">
      <span class="glyphicon glyphicon-search"></span> Search
    </button>
        
         <input style="display:none" size="60" id="file-upload"type="file" name="fileToUpload" id="fileToUpload">
    <br> 
</form>
      
          
  </div>
</div>
    
    <!-menu Nav>
     <div id="myNav_menu" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
      <a href="./bag.php"><i style="font-size:1em" class="fa">&#xf290;</i> <span class="badge"><?php  
          if($session_set == 1){
          $sql_cart_count = "SELECT COUNT(user_id) as total FROM cart_items WHERE user_id={$_SESSION['user_id']}";
            $res_cart_count = mysqli_query($conn, $sql_cart_count);
              $row_cart_count = mysqli_fetch_array($res_cart_count);
            echo $row_cart_count['total'];}
          ?></span></a>
      <a onclick="pauseAudio()" href="#"><span id="play_btn"  class="play_btn glyphicon glyphicon-volume-off"></span> </a>
    <?php 
      if($session_set == 1){
          echo "<a href='#'>Hi, {$_SESSION['username']}</a>"; 
          echo '<a href="./logout.php">Logout</a>';
      }else{
      echo ' <a href="./login.php">Log-In</a>
    <a href="./sign_up.php">Sign-Up</a>';
      }
      ?>
  </div>
</div>
    
    

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
</nav> 
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
    

        
    </script>
        
    <!--
    </body></html>
-->