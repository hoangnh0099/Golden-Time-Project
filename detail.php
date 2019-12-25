<?php include('connect.php') ?>

<!DOCTYPE html>
<html>
<?php include('header.php') ?>

<body>
<div class="main">
  <?php include('sidebar.php') ?>

  <div class="content">
    <?php
    $id = $_GET["id"];
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connect, $query);

    while ($rows = mysqli_fetch_assoc($result)) {
      echo "<div class='product-info container'>";
      echo "<img src='" . $rows["image"] . "' class='product-image'>";
      echo "<div class='product-information'>";
      echo "<h3>" . $rows["name"] . "</h3>";
      echo "<h5>Giá: " . $rows["price"] . " đ</h5>";
      echo "<button class='btn red waves-effect modal-trigger' data-target='buyNow'>Mua ngay</button>";
      echo "<button class='btn-flat waves-effect modal-trigger'>Thêm vào giỏ hàng</button>";
      echo "</div>";
      echo "</div>";
      echo "<div class='container'>";
      echo "<h4>Mô tả sản phẩm</h4>";
      echo "<div>" . $rows["description"] . "</div>";
      echo "</div>";
    }
    ?>
    <div id="buyNow" class="modal">
      <form class="container" method="POST">
        <h5>Nhập thông tin</h5>
        <div class="input-field col s12">
          <input id="fullname" type="text" name="fullname" class="validate" required>
          <label for="fullname">Họ và tên</label>
        </div>
        <div class="input-field col s12">
          <input id="address" type="text" name="address" class="validate" required>
          <label for="address">Địa chỉ</label>
        </div>
        <div class="input-field col s12">
          <input id="phone" type="text" name="phone" class="validate" required>
          <label for="phone">Số điện thoại</label>
        </div>
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email">Email</label>
        </div>
        <?php
        $id = $_GET["id"];
        $query = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($connect, $query);
        while ($rows = mysqli_fetch_assoc($result)) {
          echo "<div class='input-field col s12'>";
          echo "<input id='productName' type='text' name='productName' class='validate' value=" . $rows["name"] . ">";
          echo "<label for='productName'>Tên sản phẩm</label>";
          echo "</div>";

          echo "<div class='input-field col s12'>";
          echo "<input id='productPrice' type='text' name='productPrice' class='validate' value=" . $rows["price"] . ">";
          echo "<label for='productPrice'>Giá</label>";
          echo "</div>";

          echo "<div class='input-field col s12'>";
          echo "<input id='quantity' type='number' name='quantity' class='validate' required>";
          echo "<label for='quantity'>Số lượng</label>";
          echo "</div>";
        }
        ?>
        <button type="submit" name="submit" class="btn red" onclick="M.toast({html: 'Đặt hàng thành công'})">Mua hàng
        </button>
        <br>
        <br>
      </form>
      <?php
      if (isset($_POST["submit"])) {
        $fullname = $_POST["fullname"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $quantity = $_POST["quantity"];
        $total = $quantity * $productPrice;

        $query = "INSERT INTO bill (fullname, address, phone, email, productName, productPrice, quantity, total) VALUES ('$fullname', '$address', '$phone', '$email', '$productName', '$productPrice', '$quantity', '$total')";

        mysqli_query($connect, $query);
      }
      ?>
    </div>
  </div>
</div>
</body>

</html>