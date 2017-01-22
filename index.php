<?php require 'php/hat.php'; ?>

<!---Begin Body---------------------------------------------->

<div class="row">

  <div class="col-md-9">


<?php



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
        echo $row->content;

        }

?>
  </div><!--end left column------------------------------>
  <div class="col-md-3">

    <hr /><h3>Side Bar Menu</h3><hr>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si longus, levis; Septem autem illi non suo, sed populorum suffragio omnium nominati sunt. Cum audissem Antiochum, Brute, ut solebam, cum M. Quam ob rem tandem, inquit, non satisfacit? Quamquam non negatis nos intellegere quid sit voluptas, .</p>

    <hr />
    <h4>Admin Info</h4>
    <hr>
    <p><a class="btn btn-default" href="login.php" role="button">Enter Admin Area</a></p>


  </div><!--end right column----------------------------->



<?php include 'php/boot.php'; ?>
