<?php

if(isset($_SESSION["user"])){
  header("location: viewPages/login.php");
}else{
  header("location: viewPages/accueil.php");
}
