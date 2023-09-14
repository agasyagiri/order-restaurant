<?php
if ($_POST) {
  include "../database.php";
  // collect value of input field
  $email = $_POST['email'];
  $password = $_POST['password'];
    
  $result = mysqli_query($conn, "SELECT * FROM `user` WHERE email='".$email."'")->fetch_row();
  if ($result){
    session_start();
    $pass= $result[3];

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "ResToo0R4An";
    $decryption = openssl_decrypt($pass, $ciphering,
    $encryption_key, $options, $encryption_iv);
    if ($decryption == $password){
      $_SESSION["user"]["email"]=$email;
      $_SESSION["user"]["username"]=$result[1];
      $_SESSION["user"]["role"]=$result[4];
      if ($result[4] == "Admin") header("Location: /admin");
      else header("Location: /dashboard");
    } else header("Location: /login");
  } else {
    header("Location: ../login");
  }
  die();
}
?>