<!-- 


The <form> element has two important attributes:

action: specifies the URL that processes the form submission. In this example, the form.php will process the form.


method: specifies the HTTP method for submitting the form. The most commonly used form methods are POST and GET. In this example, the form method is post.

The form method is case-insensitive.
The name attribute will be used for accessing the value in PHP.
-->


<!-- <form action="form.php" method="post">
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" />
    </div>
    <button type="submit">Submit</button>
</form> -->



<!--
==== HTTP POST method ====

  - If a form uses the POST method, the web browser will include the form data in the HTTP request’s body. After submitting the form, you can access the form data via the associative array $_POST in PHP.

  - If a form has an input element with the name email, you can access the email value in PHP via the $_POST['email']. If the form doesn’t have an email input, the $_POST won’t have any element with the key 'email'.

  - To check if the form data contains the email, you use the isset() like this:
-->


<?php

// if(isset($_POST['email'])) {
//     // process email
//     var_dump($_POST['email']);
// }

?>

<!-- 
  HTTP GET method

  - Unlike the POST method, the GET method appends the form data in the URL that processes the form. Suppose the URL that processes the form is http://localhost/form.php. When you enter the email as hello@phptutorial.net and submit a form, you’ll see that the email value is appended to the URL like this:
  http://localhost/form.php?email=hello%40phptutorial.net

  - If the form has multiple input elements:
    http://localhost/form.php?name1=value1&name2=value2&name3=value3
  
  - The GET method, you can access the form data in PHP via the associative array $_GET.

====  HTTP GET or POST ==== 
  - In general, you should use the GET method when the form only retrieves data from the server. For example, a search form that allows users to search for information should use the GET method.

  - When you have a form that causes a change in the server, you should use the POST method. For example, a form that allows users to subscribe to a newsletter should use the POST method.
-->

<!-- PHP form example -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Form Demo</title>
</head>
<body>
    <main>
        <form action="subscribe.php" method="post">
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
    </main>
</body>
</html>