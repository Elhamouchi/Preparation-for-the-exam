<?php
//---------------------------------------------
// WARNING: this doesn't include sanitization
// and validation
//---------------------------------------------

// print_r($_POST);
echo "<pre>"; print_r($_POST);echo"</pre>";
var_dump(isset($_POST['name'], $_POST['email']));
echo "<br> <br>";
if(isset($_POST['name'], $_POST['email'])){
  // $name = $_POST['name'];
  // $email = $_POST["email"];

  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);

  echo "Thanks $name for your subscription. <br>";
  echo "Please confirm it in your inbox of email $email.";

} else {
  echo 'You need to provide your name and email address.';
}
?>

<!-- 
  - check if the name and email are in the $_POST array using the isset() function.
  Second, show a thank you message.

-->