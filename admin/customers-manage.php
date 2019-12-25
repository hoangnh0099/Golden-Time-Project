<?php include('../connect.php') ?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<body>
  <div class="main">
    <?php include('sidebar.php') ?>

    <div class="content">
      <div class="container">
        <h4>Quản lý khách hàng</h4>
        <table class="responsive-table">
          <tr>
            <td>Họ và tên</td>
            <td>Giới tính</td>
            <td>Email</td>
            <td>Số điện thoại</td>
            <td>Địa chỉ</td>
            <td>Tên đăng nhập</td>
            <td>Xoá</td>
          </tr>
          <?php
            $query = "SELECT * FROM customers";
            $result = mysqli_query($connect, $query);

            while ($rows = mysqli_fetch_assoc($result)) {
              echo "<tr>";

              echo "<td>".$rows["fullname"]."</td>";

              if ($rows["gender"] == 1) {
                echo "<td>Nam</td>";
              } else {
                echo "<td>Nữ</td>";
              }

              echo "<td>".$rows["email"]."</td>";

              echo "<td>".$rows["phone"]."</td>";

              echo "<td>".$rows["address"]."</td>";
              echo "<td>".$rows["username"]."</td>";

              echo "<td>";
              echo "<a href='customers-delete.php?id=".$rows["id"]."'>";
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