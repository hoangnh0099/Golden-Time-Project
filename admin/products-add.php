<?php include('../connect.php') ?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<body>
<div class="main">
  <?php include('sidebar.php') ?>

  <div class="content">
    <div class="container">
      <h4>Thêm sản phẩm</h4>
      <form method="POST">
        <div class="input-field col s12">
          <input id="productName" type="text" class="validate" name="productCode" required>
          <label for="productName">Mã sản phẩm</label>
        </div>
        <div class="input-field col s12">
          <input id="productName" type="text" class="validate" name="productName" required>
          <label for="productName">Tên sản phẩm</label>
        </div>
        <div class="input-field col s12">
          <input id="productPrice" type="text" class="validate" name="productPrice" required>
          <label for="productPrice">Giá sản phẩm</label>
        </div>
        <div class="input-field col s12">
          <input id="productLink" type="text" class="validate" name="productLink" required>
          <label for="productLink">Link ảnh sản phẩm</label>
        </div>
        <div class="input-field col s12">
          <input id="productQuantity" type="number" class="validate" name="productQuantity" required>
          <label for="productQuantity">Số lượng</label>
        </div>
        <div class="input-field col s12">
          <select name="productCategory">
            <option value="" disabled selected>Chọn hãng</option>
            <?php
            $query = "SELECT * FROM categories";
            $result = mysqli_query($connect, $query);

            while ($rows = mysqli_fetch_assoc($result)) {
              echo "<option value='" . $rows["name"] . "' >" . $rows["name"] . "</option>";
            }
            ?>
          </select>
        </div>
        <textarea name="productDetail"></textarea>
        <script>CKEDITOR.replace('productDetail')</script>
        <button type="submit" name="submit" class="btn red add-button">Thêm</button>
      </form>

      <?php
      if (isset($_POST['submit'])) {
        $productCode = $_POST['productCode'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productLink = $_POST['productLink'];
        $productDetail = $_POST['productDetail'];
        $productCategory = $_POST['productCategory'];
        $productQuantity = $_POST['productQuantity'];

        $query = "INSERT INTO products(name, code, price, image, description, category, quantity) VALUES ('$productName', '$productCode', '$productPrice', '$productLink', '$productDetail', '$productCategory', '$productQuantity')";
        mysqli_query($connect, $query);
      }
      ?>

    </div>
  </div>
</div>
</body>

</html>