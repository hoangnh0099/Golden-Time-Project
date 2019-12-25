<?php include('../connect.php') ?>
<?php
  $id = $_GET["id"];

  $query = "DELETE FROM bill WHERE id=$id";

  mysqli_query($connect, $query);

  header("Location: bill-manage.php");
?>