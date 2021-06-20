<?php
if (isset($_POST["del-btn"])) {

  require "../core/init.php";
  $id = $_POST['id'];
  $sql = "DELETE FROM betcodes WHERE id = $id";
  if (mysqli_query($db, $sql)) {
    header("Location: ../punters-tips.php?delete=success");
    exit();
  } else {
    header("Location: ../punters-tips.php?error=sqlerror#bet");
    exit();
  }
}