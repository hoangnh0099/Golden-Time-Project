<?php
include('connect.php');
session_start();
?>
<?php
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM customers";
  $result = mysqli_query($connect, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    if ($username == $rows["email"] && md5($password) == $rows["password"]) {
      $_SESSION["loginUser"] = $rows["email"];
      header("Location: index.php");
    } else {
      echo "<script>alert('Sai thông tin tài khoản hoặc mật khẩu')</script>";
      header("Location: index.php");
    }
  }
}
?>