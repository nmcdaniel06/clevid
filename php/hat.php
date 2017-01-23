<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Clevid</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
<!--header----------------------------->

      <div class="page-header">
        <h1>CLEVID <small>Web Development</small></h1>
      </div>

      <!-------------Navbar------------->

    <nav class="navbar navbar-inverse">
      <div class="container">
        <a class="navbar-brand" href="/clevid">Clevid</a>
        <ul class="nav navbar-nav">


          <?php

    require("php/connection.php");
    $sql = "SELECT name, url, title FROM nav";
    $result = $conn->query($sql) or die(mysqli_error());

    if($result) {

        while($row = $result->fetch_object()) {

            echo "<li><a href='{$row->url}' title='{$row->title}'>{$row->name}</a></li>";
        }
    }

?>


        </ul>
      </div>
    </nav>

    <!-------------END---Navbar------------->
