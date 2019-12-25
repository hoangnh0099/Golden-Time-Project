<?php include('../connect.php') ?>
<?php session_start() ?>

<!DOCTYPE html>
<html>
<?php include('header.php') ?>

<body>
  <form method="POST" class="container form-login">
    <?php
      if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM adminAccount";
        $result = mysqli_query($connect, $query);

        while ($rows = mysqli_fetch_assoc($result)) {
          if ($username == $rows["username"] && $password == $rows["password"]) {
            $_SESSION["loginSession"] = $username;
            header("Location: index.php");
          } else {
            echo "<div class='alert'>Sai thông tin tài khoản hoặc mật khẩu</div>";
          }
        }
      }
    ?>
    <h3>Đăng nhập</h3>
    <div class="input-field col s12">
      <input id="username" type="text" class="validate" name="username" required>
      <label for="username">Tên dăng nhập</label>
    </div>
    <div class="input-field col s12">
      <input id="password" type="password" class="validate" name="password" required>
      <label for="password">Mật khẩu</label>
    </div>
    <button type="submit" name="submit" class="btn red">Đăng nhập</button>
  </form>
</body>

</html>