<?php session_start();
if(isset($_SESSION['user_id'])){
    header("location:index.php");
}

include("database_handler.php");
$loginStatus = 0;
if(isset($_POST['login'])){
    $sql_verify_user = "SELECT * FROM user WHERE email_id='{$_POST['username']}' AND passkey = '{$_POST['pass']}'";
    //echo " ".$sql_verify_user;
    $res_verify = mysqli_query($conn, $sql_verify_user);
    $row_user = mysqli_fetch_assoc($res_verify);
    if($row_user){
        $loginStatus = 1;
    }
    
    $_SESSION['user_id'] = $row_user['user_id'];
    $_SESSION['active'] = 1;
    $_SESSION['username'] = $row_user['username'];
    //echo "Omkar".$loginStatus;
    
}
?>
<html>
<?php
include("./header.php");
?>
    
    <style>
        
        #snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 2rem;
            font-family: dosis;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
        
        
        
        
        html, body{
            background: url(./Images/dress_zara.jpg);
            background-repeat: no-repeat;
            
        }
.center-div
{
    
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 50%;
  height: 50%;
    border: 1;
  background-color: none;
  border-radius: 10px;
    border:3px solid white;
    color: white;
    
}
        .center-div h1{
          font-family: dosis; 
            text-transform: uppercase;
            letter-spacing: 10px;
            font-size: 1.5rem;   
        
        }
        .center-div h2{
          font-family: dosis; 
            text-transform: uppercase;
            letter-spacing: 10px;
            font-size: 1.5rem;  
            font-weight: 600;
        
        }
         .center-div h4{
          font-family: dosis; 
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size:1.2em;  
             color: orangered;
        }
        
        input[type=text], input[type=password], input[type=submit]{
            color: white;
            border-radius: 20px;
            padding: 5px;
            font-size: 1.5rem;
            background: none;
            border-color: white;
            border:2px solid white;
            font-family: dosis;
            transition:1s;
            text-align: center;
            width: 65%;
        }
        
        input[type=submit]{
            width: 30%;
            font-size: 1.2rem;
        }
        
        input:focus{
            background: white;
            color:black;
        }
        
        input[type=submit]:hover{
            background: white;
            color:black;
        }
        form a{
            font-family: dosis;
            transition:0.5s;
        }
        
    </style>
    <body>
        
    <div  class="center-div">
        <h2 align="center">Login</h2><br>
        <h1 align="center">HETVI_MODA<br>Fashion for Youth</h1>
        <h4 align="center"><?php if(isset($_POST['login'])){if($loginStatus == 0){echo "Invalid Credentials";}}?></h4>
    <form method="post" action="./login.php" align="center">
        <input type="text" name="username" placeholder="Email ID" required><br><br>
        <input type="password" name="pass" placeholder="Password" required><br><br>
        <input type="submit" name="login" value="LOGIN"><br><br>
        <a href="sign_up.php">Sign Up</a> / <a href="./forgot.php">Forgot Password</a>
        </form>
        </div>
        <div id="snackbar">Successfully Logged In !!<br>Now Redirecting to Home Page</div>
    <script>
        
        
        
        function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2500);
}
        
        <?php
            if($loginStatus == 1){
                echo "myFunction();";
                
                echo '
                setTimeout(function(){
                
                self.location="/ProjectH/index.php"}, 3000);
                ';
                
                
            }
        
        ?>
        
        
        </script>
    
    </body>
    </html>