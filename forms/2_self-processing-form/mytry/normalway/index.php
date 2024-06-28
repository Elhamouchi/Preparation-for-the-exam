<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>self Processing form - my try</title>
</head>
<body>
  <main>
  <?php if($_SERVER["REQUEST_METHOD"] === "GET"){?>
    <form action="" method="post">
      email: <input type="email" name="email">
      <br><br>
      password: <input type="password" name="password">
      <br><br>
      <input type="submit" value="submit">
    </form>
  <?php }else if($_SERVER["REQUEST_METHOD"] === "POST"){
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
    }}else{
      ?>
      <section>
        <p>invalide Request</p>
      </section>
      <?php
    } ?>
  </main>
</body>
</html>