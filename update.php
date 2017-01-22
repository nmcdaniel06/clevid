<?php


    if(isset($_POST['editContent'])) {

        require("php/connection.php");

        $content = $_POST['content'];
        $name = $_POST['name'];
        $sql = "UPDATE pages SET content='$content' WHERE name='$name'";
        $result = $conn->query($sql) or die(mysqli_error());

        if($result) {
            header("location: editPage.php?message=1");

        }


    }


?>
