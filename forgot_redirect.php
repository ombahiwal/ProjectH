<?php
    include("database_handler.php");
//    header("location:");


if(isset($_POST['user_token'])){   
    $sql_verify_user = "SELECT * FROM user WHERE email_id='{$_REQUEST['mail']}'";
    //echo " ".$sql_verify_user;
    $res_verify = mysqli_query($conn, $sql_verify_user);
    $row_user = mysqli_fetch_assoc($res_verify);
$sql_verify_token = "SELECT * FROM forgot_pass_tokens where user_id='{$row_user['user_id']}'";
    $res_token = mysqli_query($conn, $sql_verify_token);
    $row_token = mysqli_fetch_assoc($res_token);
if($res_token){
    if(!strcmp($row_token['token'],$_POST['user_token'])){
        $res_token_del = mysqli_query($conn, "DELETE FROM forgot_pass_tokens where user_id='{$row_user['user_id']}'");
    header("location:./change_pass.php?status={$row_user['user_id']}");
    }else{
    header("location:./forgot.php?token=0&mail={$_REQUEST['mail']}");
    }
}

}else{
$sql_verify_user = "SELECT * FROM user WHERE email_id='{$_POST['mail']}'";
    //echo " ".$sql_verify_user;
    $res_verify = mysqli_query($conn, $sql_verify_user);
    $row_user = mysqli_fetch_assoc($res_verify);
    
        $random_token = rand(1000,9999);
$sql_token_insert= "Insert into forgot_pass_tokens(token, user_id) VALUES({$random_token}, '{$row_user['user_id']}')";
$res= mysqli_query($conn, $sql_token_insert);
    if($row_user){
        $loginStatus = 1;
        header("location:./mailer/forgot_token_mail.php?token={$random_token}&to={$_POST['mail']}");
    }else{
        header("location:./forgot.php?invalid=1");
    }
    


echo "An Email has been sent to you, Now Loading..." ;   

}



?>