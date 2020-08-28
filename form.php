<?php

$post = (!empty($_POST)) ? true : false;

if($post) {
    $email = trim($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $error = '';

    if(!$name) {
        $error .= 'Please, enter Your name<br />';
    }

    function ValidateEmail($value) {
        $regex = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
        if($value == "") {
            return false;
        } else {
            $string = preg_replace($regex, "", $value);
        }
        return empty($string) ? true : false;
    }

    if(!$email) {
        $error .= "Please, enter Your email<br />";
    }
    if($email && !ValidateEmail($email)) {
        $error .= "Enter correct email<br />";
    }

    if(!$message || strlen($message) < 1) {
        $error .= "Enter Your message<br />";
    }

if(!$error) {
    $name_tema = "=?utf-8?b?". base64_encode($name) ."?=";

    $subject ="New request localhost";
    $subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";
    $message1 ="\n\nName: ".$name."\n\nE-mail: " .$email."\n\nMessage: ".$message."\n\n";	

    $header = "Content-Type: text/plain; charset=utf-8\n";

    $header .= "From: New request <ak.alina.kalinovskaya@gmail.com>\n\n";	
    $mail = mail("ak.alina.kalinovskaya@gmail.com", $subject1, iconv ('utf-8', 'windows-1251', $message1), iconv ('utf-8', 'windows-1251', $header));
}
    if($mail) {
        echo 'OK';
    } else {
        echo '<div class="notification_error">'.$error.'</div>';
    }

}

?>