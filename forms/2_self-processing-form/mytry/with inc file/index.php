<?php 

  include "inc/header.php";
  
  if($_SERVER["REQUEST_METHOD"] === "GET"){
    include "inc/get.php";
  }else if($_SERVER["REQUEST_METHOD"] === "POST"){
    include "inc/post.php";
  }

  include "inc/footer.php";