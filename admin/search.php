<?php include('../connect.php') ?>

<!DOCTYPE html>
<html>
<?php include('header.php') ?>

<body>
<div class="main">
  <?php include('sidebar.php') ?>

  <div class="content">
    <div class="container">
      <h4>Quản lý sản phẩm</h4>
      <div class="">
        <form method="GET" action="search.php">
          <input type="text" name="search" placeholder="Tìm kiếm sản phẩm">
        </form>
      </div>
      <table>
        <tr>
          <td>Hình ảnh</td>
          <td>Tên sản phẩm</td>
          <td>Hãng sản xuất</td>
          <td>Giá sản phẩm</td>
          <td>Sửa</td>
          <td>Xoá</td>
        </tr>
        <?php
        $search = $_GET["search"];
        $query = "SELECT * FROM products WHERE name like '%$search%'";
        $result = mysqli_query($connect, $query);

        while ($rows = mysqli_fetch_assoc($result)) {
          echo "<tr>";

          echo "<td><img src='".$rows["image"]."' class='product-image'></td>";

          echo "<td>".$rows["name"]."</td>";

          echo "<td>".$rows["category"]."</td>";

          echo "<td>".$rows["price"]." đ</td>";

          echo "<td>";
          echo "<a href='products-edit.php?id=".$rows["id"]."'>";
          echo "<i class='material-icons'>create</i>";
          echo "</a>";
          echo "</td>";

          echo "<td>";
          echo "<a href='products-delete.php?id=".$rows["id"]."'>";
          echo "<i class='material-icons'>delete</i>";
          echo "</a>";
          echo "</td>";

          echo '</tr>';
        }
        ?>
      </table>
    </div>
  </div>
</div>
</body>

</html>