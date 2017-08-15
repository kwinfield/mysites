<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$from = $_POST['email'];
$message = $_POST['message'];
$subject = "Recieved Mail from Mr/Ms '$lastName'";
$to="keith.r.winfield@gmail.com";
$headers= "MIME-VERSION: 1.0" . "\r\n";
$headers .="content-type:text/html;charset=UTF-8" . "\r\n";
$headers ="From : <$from> \r\n";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="testsite.css" rel="stylesheet" type="text/css">
</head>

<body>
</body>
</html>