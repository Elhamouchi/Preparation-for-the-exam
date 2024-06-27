<?php

const NAME_REQUIRED = 'Please enter your name';
const EMAIL_REQUIRED = 'Please enter your email';
const EMAIL_INVALID = 'Please enter a valid email';

// sanitize and validate name
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$inputs['name'] = $name;

if ($name) {
    $name = trim($name);
    if ($name === '') {
        $errors['name'] = NAME_REQUIRED;
    }
} else {
    $errors['name'] = NAME_REQUIRED;
}


// sanitize & validate email
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    // validate email
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors['email'] = EMAIL_INVALID;
    }
} else {
    $errors['email'] = EMAIL_REQUIRED;
}
?>

<?php if (count($errors) === 0) : ?>
    <section>
        <h2>
            Thanks <?php echo htmlspecialchars($name) ?> for your subscription!
        </h2>
        <p>Please follow the steps below to complete your subscription:</p>
        <ol>
            <li>Check your email (<?php echo htmlspecialchars($email) ?>) - Find the message sent from webmaster@phptutorial.net</li>
            <li>Click to confirm - Click on the link in the email to confirm your subscription.</li>
        </ol>
    </section>

<?php endif ?>