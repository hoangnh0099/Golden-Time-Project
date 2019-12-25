<?php include("../connect.php") ?>

<?php
session_start();

if (!isset($_SESSION["loginSession"])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<body>
  <div class="main">
    <?php include('sidebar.php') ?>
    <div class="content">
      <div class="container">
        <h5>Trang quản trị Golden Time Store</h5>
        <div class="row">
          <?php
          $query = "SELECT * FROM products";
          $result = mysqli_query($connect, $query);
          $productNumber = mysqli_num_rows($result);
          ?>
          <div class="col s12 m6">
            <div class="card blue-grey darken-1">
              <div class="card-content white-text">
                <span class="card-title">Sản phẩm</span>
                <p>Đang có <?php echo $productNumber ?> sản phẩm</p>
              </div>
              <div class="card-action">
                <a href="products-manage.php">Xem chi tiết</a>
              </div>
            </div>
          </div>

          <?php
            $query = "SELECT * FROM bill";
            $result = mysqli_query($connect, $query);
            $billNumber = mysqli_num_rows($result);
          ?>
          <div class="col s12 m6">
            <div class="card blue-grey darken-1">
              <div class="card-content white-text">
                <span class="card-title">Đơn hàng</span>
                <p>Đang có <?php echo $billNumber ?> đơn hàng</p>
              </div>
              <div class="card-action">
                <a href="bill-manage.php">Xem chi tiết</a>
              </div>
            </div>
          </div>

          <?php
            $query = "SELECT * FROM feedback";
            $result = mysqli_query($connect, $query);
            $feedbackNumber = mysqli_num_rows($result);
          ?>
          <div class="col s12 m6">
            <div class="card blue-grey darken-1">
              <div class="card-content white-text">
                <span class="card-title">Phản hồi</span>
                <p>Đang có <?php echo $feedbackNumber ?> phản hồi từ khách hàng</p>
              </div>
              <div class="card-action">
                <a href="feedback-manage.php">Xem chi tiết</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>