<?php
include('config.php');

if(isset($_POST['token'])){
  $token=$_POST['token'];
  if($token=='qwerty123'){
      //Access Granted!
      $u=$_POST['username'];
      $p=md5($_POST['password']);
      $sql="SELECT * FROM users WHERE user_name='$u' AND user_pass ='$p' ";
      if($rs=$conn->query($sql)){
          if($rs->num_rows > 0 ){
              echo "Login Success!";
          }
          else{
            echo "Error:Invalid Credentials!";
          }
      }else{
        echo $conn->error;
      }
  }
  else{
    echo "Access Denied!";
    return;
  }
}
?>