
<?php
// Check for empty fields
//if(empty($_POST['name'])      ||
//   empty($_POST['email'])     ||
//empty($_POST['phone'])     ||
//   empty($_POST['message'])   ||
//   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//   {
//   echo "No arguments Provided!";
//   return false;
//   }
   
//$name = strip_tags(htmlspecialchars($_POST['name']));
//$email_address = strip_tags(htmlspecialchars($_POST['email']));
//$name = strip_tags(htmlspecialchars($_POST['name'])); 
//$email_address = strip_tags(htmlspecialchars($_POST['email']));
//$phone = strip_tags(htmlspecialchars($_POST['phone']));
//$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
//$to = 'dhyanuwebsolution@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
//$email_subject = "Website Contact Form:  $name";
//$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
//$headers = "From: dhyanuwebsolution@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";   
//mail($to,$email_subject,$email_body,$headers);
//return true;       

// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("./sendgrid-php.php");
// If not using Composer, uncomment the above line
$email = new \SendGrid\Mail\Mail();
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test@example.com", "Example User");
$email->addContent(
    "text/plain", "and easy to do anywhere, even with PHP"
);
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('')); // SENDGRID_API_KEY
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
  
?>