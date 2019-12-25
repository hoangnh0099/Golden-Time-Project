<?php include('../connect.php') ?>
<?php
$id = $_GET["id"];

$query = "DELETE FROM categories WHERE id=$id";

mysqli_query($connect, $query);

header("Location: categories-manage.php");
?>