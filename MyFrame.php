<head>
  <meta charset="utf-8">
 <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>E&A Gamer</title>
    <meta name="description" content="a game selling website" />
    <meta name="keywords" content="games,steam,MOBA,FPS,action,advanture,casual">
    <meta name="author" content="E&A Group">

    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="Logo.png" rel="icon" type="image/png" />

  </head>

 
<?php
$serverName = 'localhost';
$username = 'id14943896_root';
$password = 'Qpd6u(O<_42h@|FK';
$DBName = 'id14943896_mydb';

$conn = new mysqli($serverName, $username, $password, $DBName);

if ($conn->connect_error) {

    die('connection fail :' . $conn->connect_error);
}

?>