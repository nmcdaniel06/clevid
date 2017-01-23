<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: login.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>
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
    <script src='tinymce/tinymce.min.js'></script>
    <script>
    tinymce.init({
      selector: '#mytextarea'
    });
    </script>

  </head>
  <body id="admin">

<div class="container">

  <div class="page-header">
  <h1>Clevid  <small>Admin Page</small></h1>
</div>

<div class="row">
  <div class="col-md-9">
    <?php

    if(isset($_GET['message'])) {
        echo "<p><font color='red'>Update Successful</font></P>";
    }



        require("php/connection.php");

         if((isset($_GET['page']))) {
        $page = $_GET['page'];
    }else {
        $page = 'home';
    }

    $sql = "SELECT name, content FROM pages WHERE name='$page'";
    $result = $conn->query($sql) or die(mysqli_error());

    if($result) {

        $row = $result->fetch_object();
        echo "<h2>" . $row->name . "</h2>";
        echo '<form method="post" action="update.php">';
        echo '<input type="hidden" name="name" value="' . $row->name . '" />';
        echo '<textarea id="mytextarea" name="content">';
        echo $row->content;
        echo '</textarea>';
        echo '<input type="submit" name="editContent" value="Save" />';
        echo '</form>';
        }


    ?>




  </div>

<!------------------SideBar------------>
<div class="col-md-3">


<ul class="nav nav-pills nav-stacked">

<?php


    $sql = "SELECT name FROM nav";
    $result = $conn->query($sql) or die(mysqli_error());

    if($result) {

        while($row = $result->fetch_object()) {

            echo "<li><a href='editPage.php?page={$row->name}'>{$row->name}</a></li>";
        }
    }

?>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?></a></li>
      <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
    </ul>

</div>
</div>

<?php include 'php/boot.php'; ?>
