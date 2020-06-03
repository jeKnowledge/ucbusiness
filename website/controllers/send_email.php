<?php

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$message = htmlspecialchars($_POST["message"]);

$message = wordwrap($message, 70, "\r\n");

mail("jfacc31@gmail.com", $name, $message);