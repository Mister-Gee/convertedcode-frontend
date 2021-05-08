<?php

if(isset($_POST['contact.inc.php'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $header = "From: JLG Website by: ".$email;
    $header .= "Reply-To: <JLG@gmail.com>\r\n";
    $header .= "Content-type: text/html\r\n";
    $subject = "New Email List";
    $mailto = "JLG@gmail.com";
    $message = $_POST['msg'];

    mail($mailto, $subject, $message, $header);
    header("Location: index.html?mailsend");
}

?>