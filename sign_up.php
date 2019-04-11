
<?php
session_start();
if(isset($_SESSION['user_id'])){
    header("location:http://localhost:8888/ProjectH/");
}
echo"<html>";
include("database_handler.php");
include("header.php");
$status = 1;
if(isset($_POST['signup'])){
//    echo $_POST['user_email'];
    $sql_check_already = "SELECT * FROM user WHERE email_id='{$_POST['user_email']}'";
    $res_check_already = mysqli_query($conn, $sql_check_already);
    $row_check_already = mysqli_fetch_assoc($res_check_already);
    if($row_check_already != 0){
        $status = 0;
    }else{
        $status = 1;
    }
    if($status == 1){
        $sql_insert_user = "INSERT INTO user (username, email_id, passkey) VALUES ('{$_POST['username']}', '{$_POST['user_email']}','{$_POST['pass']}')";
        $res_insert_user = mysqli_query($conn, $sql_insert_user);
        //$row_insert_user = mysqli_fetch_assoc($res_insert_user);
        
        if($res_insert_user == 0){
            $status = 3;
        }else{
            $status = 2;
        }
        
    }   
}
?>
<style>
      html, body{
            background: url(./Images/adventure_denim.jpg);
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
  height: 65%;
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
            font-size: 2rem;  
            font-weight: 600;
        
        }
         .center-div h4{
          font-family: dosis; 
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size:1.2rem;  
             color: orangered;
        
        }
        
        
        input[type=text],input[type=email] ,input[type=password], input[type=submit]{
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
            width: 25%;
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
    </style>
    <body>
        
    <div  class="center-div">
        <h2 align="center">Sign Up</h2><br>
        <h1 align="center">HETVI_MODA<br>Fashion for Youth</h1>
        <h4 align="center"><?php if(isset($_POST['signup'])){if($status == 0){echo "User Already Exists";}else if($status == 3){echo"Sorry, Try Again!!";}}?></h4>
    <form method="post" action="./sign_up.php" align="center">
        <input type="text" name="username" placeholder="Your Name" required><br><br>        <input type="email" name="user_email" placeholder="Your Email ID" required><br><br>
        <input type="password" name="pass" placeholder="Create Password" required><br><br>
        <input type="submit" name="signup" value="SIGN UP"><br><br>
        <a href="./login.php">Already have an account?</a>
        </form>
        </div>
        <div id="snackbar">Account Created Successfully!! <br>Now Redirecting to Login Page</div>
</body>
<script>
        
    function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3500);
}   
    <?php
if($status == 2){
               echo "myFunction();";
                echo "setTimeout(function(){
                self.location=\"http://localhost:8888/ProjectH/mailer/sendmail.php?to={$_POST['user_email']}&user={$_POST['username']}\"}, 3000);";
            } ?>
</script>

</html>