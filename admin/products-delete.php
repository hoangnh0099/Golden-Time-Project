<?php include('../connect.php') ?>
<?php
  $id = $_GET["id"];

  $query = "DELETE FROM products WHERE id=$id";

  mysqli_query($connect, $query);

  header("Location: products-manage.php");
?>