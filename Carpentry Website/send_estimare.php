<?php
if(isset($_POST['email'])) {
     
    $email_to = "support@af-carpentry.com";
    $email_subject = "ESTIMATES from www.af-carpentry.com WEBSITE!";
     
     
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['city']) ||
        !isset($_POST['state']) ||
        !isset($_POST['email'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name = $_POST['name']; // required - DONE
    $address = $_POST['address']; //not required
    $city = $_POST['city']; //required - DONE
    $state = $_POST['state']; //required - DONE
    $telephone = $_POST['telephone']; // not required
    $email_from = $_POST['email']; // required -DONE
    $specify = $_POST['specify']; // not required
    $details = $_POST['details']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$city)) {
    $error_message .= 'The City you entered does not appear to be valid.<br />';
  }
   if(!preg_match($string_exp,$state)) {
    $error_message .= 'The State you entered does not appear to be valid.<br />';
  }
  if(strlen($details) < 2) {
    $error_message .= 'The Details you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Address: ".clean_string($address)."\n";
    $email_message .= "City: ".clean_string($city)."\n";
    $email_message .= "State: ".clean_string($state)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Specify: ".clean_string($specify)."\n";
    $email_message .= "Details: ".clean_string($details)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
}
?>