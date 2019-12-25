<?php include('../connect.php') ?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<body>
  <div class="main">
    <?php include('sidebar.php') ?>

    <div class="content">
      <div class="container">
        <h4>Quản lý đơn hàng</h4>
        <table>
          <tr>
            <td>Khách hàng</td>
            <td>Địa chỉ</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Tên sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
            <td>Xoá</td>
          </tr>
          <?php
            $query = "SELECT * FROM bill";
            $result = mysqli_query($connect, $query);

            while ($rows = mysqli_fetch_assoc($result)) {
              echo "<tr>";

              echo "<td>".$rows["fullname"]."</td>";

              echo "<td>".$rows["address"]."</td>";

              echo "<td>".$rows["phone"]."</td>";

              echo "<td>".$rows["email"]."</td>";

              echo "<td>".$rows["productName"]."</td>";

              echo "<td>".$rows["productPrice"]." đ</td>";

              echo "<td>".$rows["quantity"]."</td>";

              echo "<td>".$rows["total"]."</td>";

              echo "<td>";
              echo "<a href='bill-delete.php?id=".$rows["id"]."'>";
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