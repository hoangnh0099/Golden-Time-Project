<?php include('connect.php') ?>
<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $sex = $_POST["sex"];

  $encryptedPassword = md5($password);

  if ($encryptedPassword != md5($repassword)) {
    header("Location: index.php");
  } else {
    $query = "INSERT INTO customers(
                username, 
                fullname, 
                password, 
                email, 
                phone, 
                address, 
                gender
            ) VALUES (
                '$username', 
                '$fullname', 
                '$encryptedPassword', 
                '$email', 
                '$phone', 
                '$address', 
                '$sex'
            )";

    mysqli_query($connect, $query);
    header("Location: index.php");
  }
}
?>