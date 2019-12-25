<?php include('../connect.php') ?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<body>
<div class="main">
  <?php include('sidebar.php') ?>

  <div class="content">
    <div class="container">
      <h4>Quản lý hãng sản xuất</h4>
      <table>
        <tr>
          <td>Tên hãng</td>
          <td>Xoá</td>
        </tr>
        <?php
        $query = "SELECT * FROM categories";
        $result = mysqli_query($connect, $query);

        while ($rows = mysqli_fetch_assoc($result)) {
          echo "<tr>";

          echo "<td>".$rows["name"]."</td>";

          echo "<td>";
          echo "<a href='categories-delete.php?id=".$rows["id"]."'>";
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