<?php include('../connect.php') ?>
<?php
  $id = $_GET["id"];

  $query = "DELETE FROM customers WHERE id=$id";

  mysqli_query($connect, $query);

  header("Location: customers-manage.php");
?>