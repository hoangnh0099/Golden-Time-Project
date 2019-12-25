<?php
include('connect.php');

session_start();

if (isset($_SESSION["loginUser"])) {
  $loginUser = $_SESSION["loginUser"];
}
$status = "";
if (isset($_POST['code']) && $_POST['code'] != "") {
  $code = $_POST['code'];
  $result = mysqli_query($connect, "SELECT * FROM `products` WHERE `code`='$code'");
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $code = $row['code'];
  $price = $row['price'];
  $image = $row['image'];

  $cartArray = array(
    $code => array(
      'name' => $name,
      'code' => $code,
      'price' => $price,
      'quantity' => 1,
      'image' => $image
    )
  );

  if (empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Thêm hàng thành công!</div>";
  } else {
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if (in_array($code, $array_keys)) {
      $status = "<div class='box'>Sản phẩm này đã được thêm vào giỏ hàng!</div>";
    } else {
      $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
      $status = "<div class='box'>Thêm hàng thành công!</div>";
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
    <?php
    if (isset($_SESSION["loginUser"])) { ?>
      <div class="user-area">
        <div class="user-box">
          <img src="assets/images/user.png" class="user-avatar">
          <a class="waves-effect waves-light btn-flat dropdown-trigger" href="#" data-target='dropdown1'>
            Xin chào <?php echo $loginUser ?>
          </a>
        </div>
      </div>

      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="#!">Tài khoản</a></li>
        <li><a href="#!">Đổi mật khẩu</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="signOut.php">Đăng xuất</a></li>
      </ul>
      <?php
    } else {
      include('userBox.php');
    }
    ?>

    <?php include('carousel.php') ?>

    <div class="products-area">
      <div class="row">
        <?php
        $query2 = "SELECT count(id) as total FROM products";
        $result2 = mysqli_query($connect, $query2);
        $rows = mysqli_fetch_assoc($result2);

        $totalRecord = $rows['total'];
        $currentPage = isset($_GET["page"]) ? $_GET["page"] : 1;
        $limit = 3;
        $start = ($currentPage - 1) * $limit;
        $totalPage = ceil($totalRecord / $limit);

        if ($currentPage > $totalPage) {
          $currentPage = $totalPage;
        } else {
          if ($currentPage < 1) {
            $currentPage = 1;
          }
        }
        ?>
        <?php
        $query = "SELECT * FROM products LIMIT $start, $limit";
        $result = mysqli_query($connect, $query);

        while ($rows = mysqli_fetch_assoc($result)) {
          echo "<div class='col s12 m4'>
                    <form method='post'>
                      <input type='hidden' name='code' value=" . $rows['code'] . " />
                      <div class='card'>
                        <div class='card-image'>
                          <img src=" . $rows["image"] . ">
                          <button type='submit' class='btn-floating halfway-fab waves-effect waves-light red'>
                            <i class='material-icons'>add_shopping_cart</i>
                          </button>
                        </div>
                        <div class='card-content'>
                          <a href='detail.php?id=" . $rows["id"] . "' class='card-title'>" . $rows["name"] . "</a>
                          <p> Hãng: " . $rows["category"] . "</p>
                          <p> Giá: " . $rows["price"] . " đ</p>
                        </div>
                      </div>
                    </form>
                  </div>";
        }
        ?>
      </div>

      <ul class="pagination">
        <?php
        if ($currentPage > 1 && $totalPage > 1) {
          echo "<li><a href='index.php?page=" . ($currentPage - 1) . "'><i class='material-icons'>chevron_left</i></a></li>";
        }

        for ($i = 1; $i <= $totalPage; $i++) {
          if ($i == $currentPage) {
            echo "<li><a href='index.php?page=" . $i . "'>" . $i . "</a></li>";
          } else {
            echo '<li><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
          }
        }

        if ($currentPage < $totalPage && $totalPage > 1) {
          echo "<li>";
          echo "<a href='index.php?page=" . ($currentPage + 1) . "'>";
          echo "<i class='material-icons'>chevron_right</i>";
          echo "</a>";
          echo "</li>";
        }
        ?>
      </ul>
    </div>
    <div class="message_box">
      <?php echo $status; ?>
    </div>
  </div>
</div>
</body>

</html>