<?php

    // Get the form fields, removes html tags and whitespace.
    $firstname = strip_tags(trim($_POST["firstname"]));
    $lastname = strip_tags(trim($_POST["lastname"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $address = strip_tags(trim($_POST["address"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
   // $message = trim($_POST["message"]);
    $use=$_POST['use'];
    $message_use = "Purpose of use  :".$use.".";
    $district=strip_tags(trim($_POST['district']));
    $message_district ="Area/District   :".$district ;
    // $connectionType=$_POST['connection'];
    // $message_connectionType = "Connection Type :".$connectionType.".";

    // Check the data.
    if (empty($firstname) OR empty($lastname) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {

       header("Location: http://www.bsnlfiberjk.com");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "sales@bsnlfiberjk.com";

    // Set the email subject.
    $subject = "Fiber Connection Query $name";

    // Build the email content.   
    $email_content = "Name: $firstname "."$lastname\n";    
    $email_content .= "Phone:$phone\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Address:$address\n";
    $email_content .= "$message_district\n";
    $email_content .= "$message_use\n";
    $email_content .= "$message_connectionType\n";


    // Build the email headers.
    $email_headers = "From: $Apply sales@bsnlfiberjk.com";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);
    
    // Redirect to the index.html page with success code
    header("Location: http://www.bsnlfiberjk.com");

?>