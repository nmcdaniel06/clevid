<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
 header("Location: admin.php");
 exit;
}

if (isset($_POST['btn-login'])) {

 $email = strip_tags($_POST['email']);
 $password = strip_tags($_POST['password']);

 $email = $DBcon->real_escape_string($email);
 $password = $DBcon->real_escape_string($password);

 $query = $DBcon->query("SELECT user_id, email, password FROM tbl_users WHERE email='$email'");
 $row=$query->fetch_array();

 $count = $query->num_rows; // if email/password are correct returns must be 1 row

 if (password_verify($password, $row['password']) && $count==1) {
  $_SESSION['userSession'] = $row['user_id'];
  header("Location: admin.php");
 } else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
 }
 $DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clevid: Admin Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="main.css" type="text/css" />
</head>
<body>

<div class="signin-form">

 <div class="container">

   <div class="row">
     <div class="col-md-6 col-md-offset-3">

       <form class="form-signin" method="post" id="login-form">

        <h2 class="form-signin-heading">Clevid Admin</h2><hr />

        <?php
  if(isset($msg)){
   echo $msg;
  }
  ?>

        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="email" required />
        <span id="check-e"></span>
        </div>

        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>

      <hr />

        <div class="form-group">
            <button type="submit" class="btn btn-success" name="btn-login" id="btn-login">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
   </button>

            <a href="register.php" class="btn btn-danger">Sign UP Here</a>
            <a href="index.php" class="btn btn-primary" style="float:right;">Back to Homepage</a>

        </div>



      </form>
    </div><!--   col -->
  </div> <!--   my row -->

    </div>

</div>

<?php include 'php/boot.php'; ?>
