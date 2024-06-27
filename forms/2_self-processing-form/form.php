<!--
php tutorial example
-->



<!-- 
  Sometimes, you want to include both form and logic for handling form submission in a single PHP file. This form is often referred to as a self-processing form.

  To create a self-processing form, you can use the $_SERVER['REQUEST_METHOD'] that returns the request method e.g., GET or POST.

  If the $_SERVER['REQUEST_METHOD']  is GET, you show the form. And if the $_SERVER['REQUEST_METHOD']  is POST, you process it. For example:
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>PHP Form</title>
</head>
<body>
  <main>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') : ?>
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div>
          <label for="name">Name:</label>
          <input type="text" name="name" required="required" placeholder="Enter your name" />
        </div>

        <div>
          <label for="name">Email:</label>
          <input type="email" name="email" required="required" placeholder="Enter your email" />
        </div>

        <button type="submit">Subscribe</button>

      </form>
    <?php else : ?>

      <?php
      //---------------------------------------------
      // WARNING: this doesn't include sanitization
      // and validation
      //---------------------------------------------
      
      if (isset($_POST['name'], $_POST['email'])) {
          $name = htmlspecialchars($_POST['name']);
          $email = htmlspecialchars($_POST['email']);

          // show the $name and $email
          echo "Thanks $name for your subscription.<br>";
          echo "Please confirm it in your inbox of the email $email.";
      } else {
          echo 'You need to provide your name and email address.';
      }

      echo "<br>";
      echo $_SERVER['REQUEST_METHOD'];
      $_SERVER['REQUEST_METHOD'] = 'GET';
      echo $_SERVER['REQUEST_METHOD'];
      
      unset($_POST);
      
      ?>

    <?php endif ?>
  </main>
</body>

</html>



