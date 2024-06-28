<?php
  if(isset($_POST["email"], $_POST["password"])){
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    if(filter_var($email, FILTER_VALIDATE_EMAIL) && strlen(trim($password)) > 3){
    ?>
    <section>
      <h1>hello,</h1>
      <p>email: <?=$email?></p>
    </section>
    <?php
    }else{
      ?>
    <section>
      <p>invalide email or password</p>
    </section>
    <?php
    }
  }else{
    ?>
    <section>
      <p>where is email or password?</p>
    </section>
    <?php
  }