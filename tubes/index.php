<?php
session_start();
if(isset($_SESSION['login'])){
  header('Location: dashboard/index.php');
}else{
  echo "Redirecting to login page...";
  header('Location: ./login.php');
  
}