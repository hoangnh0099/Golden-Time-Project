<?php include('connect.php');
session_start();
$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove") {
  if (!empty($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $key => $value) {
      if ($_POST["code"] == $key) {
        unset($_SESSION["shopping_cart"][$key]);
        $status = "<div class='box'>
		Sản phẩm đã được xóa khỏi giỏ hàng!</div>";
      }
      if (empty($_SESSION["shopping_cart"]))
        unset($_SESSION["shopping_cart"]);
    }
  }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
  foreach ($_SESSION["shopping_cart"] as &$value) {
    if ($value["code"] === $_POST["code"]) {
      $value['quantity'] = $_POST["quantity"];
      break;
    }
  }

}
?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<body>
<div class="main">

  <?php include('sidebar.php') ?>

  <div class="content">
    <?php include('userBox.php') ?>

    <div class="products-area">
      <h5>Giỏ hàng</h5>
      <?php
      if (isset($_SESSION["shopping_cart"])) {
        $total_price = 0;
        ?>
        <table class="table striped">
          <tr>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Số lượng</td>
            <td>Giá tiền</td>
            <td>Tổng tiền</td>
            <td>Xóa sản phẩm</td>
          </tr>
          <?php foreach ($_SESSION["shopping_cart"] as $product) { ?>
            <tr>
              <td><?php echo $product["code"]; ?></td>
              <td><?php echo $product["name"]; ?></td>
              <td><img src='<?php echo $product["image"]; ?>' width="100" height="100"/></td>
              <td>
                <form method='post' action=''>
                  <input type='hidden' name='code' value="<?php echo $product["code"]; ?>"/>
                  <input type='hidden' name='action' value="change"/>
                  <input type='number' name='quantity' value="<?php echo $product["quantity"]; ?>">
                </form>
              </td>
              <td><?php echo $product["price"]; ?></td>
              <td><?php echo $product["price"] * $product["quantity"]; ?></td>
              <td>
                <form method='post' action=''>
                  <input type='hidden' name='code' value="<?php echo $product["code"]; ?>"/>
                  <input type='hidden' name='action' value="remove"/>
                  <button type='submit' class='btn-flat'>Xóa sản phẩm</button>
                </form>
              </td>
            </tr>
            <?php $total_price += ($product["price"] * $product["quantity"]);
          } ?>
          <tr>
            <td colspan="6">
              <strong>Tổng tiền: <?php echo $total_price; ?> đ</strong>
            </td>
            <td colspan="1">
              <button class="btn red modal-trigger" data-target='buyNow'>Thanh toán</button>
            </td>
          </tr>
        </table>
        <?php
      } else {
        echo "<h4>Bạn không có sản phẩm nào cả!</h4>";
      }
      ?>
    </div>

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
        echo "<div class='input-field col s12'>";
        echo "<input id='productName' type='text' name='productName' class='validate' value=" . $product["name"] . ">";
        echo "<label for='productName'>Tên sản phẩm</label>";
        echo "</div>";

        echo "<div class='input-field col s12'>";
        echo "<input id='productPrice' type='text' name='productPrice' class='validate' value=" . $product["price"] . ">";
        echo "<label for='productPrice'>Giá</label>";
        echo "</div>";

        echo "<div class='input-field col s12'>";
        echo "<input id='quantity' type='number' name='quantity' class='validate' value='" . $product["quantity"] . "' required>";
        echo "<label for='quantity'>Số lượng</label>";
        echo "</div>";
        ?>
        <button type="submit" name="submit" class="btn red">
          Mua hàng
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

    <div class="message_box">
      <?php echo $status; ?>
    </div>
</body>

</html>
