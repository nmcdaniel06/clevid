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
        //echo "<h2>" . $row->name . "</h2>";
        echo $row->content;

        }

?>
  </div><!--end left column------------------------------>
  <div class="col-md-3">
    <a href="https://www.shopify.com/?ref=nathan-mcdaniel"> <img src="pics/shopify-partner.jpg" class="img-responsive" alt="Responsive image"></a>

    <a href="https://www.shopify.com/?ref=nathan-mcdaniel"> <img src="pics/smshopify.jpg" class="img-responsive" alt="Responsive image"></a>
  </div><!--end right column----------------------------->



<?php include 'php/boot.php'; ?>
