<?php include('../connect.php') ?>

<!DOCTYPE html>
<html>
<?php include('header.php') ?>

<body>
<div class="main">
  <?php include('sidebar.php') ?>

  <div class="content">
    <div class="container">
      <h4>Thêm hãng sản xuất</h4>
      <form method="POST">
        <div class="input-field col s12">
          <input id="productName" type="text" class="validate" name="brandName" required>
          <label for="productName">Tên hãng sản xuất</label>
        </div>
        <button type="submit" name="submit" class="btn red add-button">Thêm</button>
      </form>

      <?php
      if (isset($_POST['submit'])) {
        $brandName = $_POST['brandName'];

        $query = "INSERT INTO categories(name) VALUES('$brandName')";
        mysqli_query($connect, $query);
      }
      ?>

    </div>
  </div>
</body>
</html>
