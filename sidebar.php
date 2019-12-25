<?php include('connect.php'); ?>

<div class="sidebar">
  <a class="brand-logo" href="http://localhost:8080/golden-time-project/">Golden Time</a>

  <form method="GET" action="search.php" class="search-form">
    <input type="text" placeholder="Tìm kiếm" class="search-input" name="search">
  </form>
  <?php
  $cart_count = 0;
  if (!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
  }
  ?>
  <ul class="collection z-depth-0">
    <li class="collection-item">
      <a href="cart.php" class="black-text">
        <span class="badge"><?php echo $cart_count; ?> sản phẩm</span>
        Giỏ hàng
      </a>
    </li>
  </ul>

  <ul class="collapsible z-depth-0">
    <li>
      <div class="collapsible-header waves-effect">Danh mục</div>
      <div class="collapsible-body">
        <ul class="category">
          <?php
          $query = "SELECT name FROM categories";
          $result = mysqli_query($connect, $query);

          while ($rows = mysqli_fetch_assoc($result)) {
            echo "<li class='category-item'>";
            echo "<a href='categories.php?brand=" . $rows["name"] . "'>Đồng hồ " . $rows["name"] . "</a>";
            echo "</li>";
          }
          ?>
        </ul>
      </div>
    </li>
  </ul>

  <ul class="collection z-depth-0">
    <li class="collection-item">
      <a href="feedback.php" class="black-text">Phản hồi</a>
    </li>
  </ul>

  <ul class="collapsible z-depth-0 footer">
    <li>
      <div class="collapsible-header waves-effect">Nhóm 1 - Click here</div>
      <div class="collapsible-body">
        <p>Nguyễn Huy Hoàng</p>
        <p>Ngày sinh: 4 - 2 - 1999</p>
        <br>
        <p>Nguyễn Thị Phương</p>
        <p>Ngày sinh: 6 - 12 - 1999</p>
        <br>
        <p>Nguyễn Thị Ngọc Ánh</p>
        <p>Ngày sinh: 24 - 5 - 1999</p>
      </div>
    </li>
  </ul>
</div>