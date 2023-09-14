<?php
if ($_POST) {
  include "../database.php";
  // collect value of input field
  $email = $_POST['email'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $ciphering = "AES-128-CTR";
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;
  $encryption_iv = '1234567891011121';
  $encryption_key = "ResToo0R4An";
  $encryption = openssl_encrypt($password, $ciphering,
              $encryption_key, $options, $encryption_iv);
    
  $result = mysqli_query($conn, "INSERT INTO `user` ( `email`, `name`, `password` ) values('".$email."', '".$name."', '".$encryption."') ");
  header("Location: /login");
  die();
}
?>