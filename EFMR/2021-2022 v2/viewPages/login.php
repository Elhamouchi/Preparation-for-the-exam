<?php
// session_Start();
include "../inc/templetes/header.php";
include "../inc/functions/flash.php";


echo "<pre>";
print_r($_SESSION);
echo"</pre>";
?>


<div class="container my-5">
  <form method="post" action="../funcPages/authentification.php"> 
    <?php flash("auth")?>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>


<?php
include "../inc/templetes/footer.php";
?>