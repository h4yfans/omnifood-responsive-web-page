<?php

// Get the from fields, removes html tags and whitespace
$name = strip_tags(trim($_POST["name"]));
$name = str_replace(array("\r", "\n"), array(" ", " "), $name);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
$message = trim($_POST["message"]);


// Check the data
if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("localhost/omnifood/?success=-1#form");
    exit;
}

// Set the recipient email address. Update this to YOUR desired email adress.
$recipient = "kaan94karaca@gmail.com";

// Set the email subject
$subject = "New contact from $name - omnifood";

// Build the email contect
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Message: \n$message\n";

// Build the email headers.
$email_headers = "From: $name <$email>";

// Send the email
mail($recipient, $subject, $email_content,$email_headers);

header("localhost/omnifood/?success=1#form");


?>
