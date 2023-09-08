<?php
session_start();
if (!$_SESSION && !$_SESSION["user"]) return header("Location: ../login");
$username = $_SESSION["user"]["username"];
$email = $_SESSION["user"]["email"];
$role = $_SESSION["user"]["role"];
?>