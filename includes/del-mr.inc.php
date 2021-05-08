<?php
if(isset($_POST["del-mr"])){

    require "../core/init.php";
    $id = $_POST['id'];
    $sql = "DELETE FROM matchreview WHERE id = $id";
    if(mysqli_query($db, $sql)){
        header("Location: ../match-review.php?delete=success");
        exit();  
          }
          else{
            header("Location: ../match-review.php?error=sqlerror#bet");
             exit();  
      }
     
}