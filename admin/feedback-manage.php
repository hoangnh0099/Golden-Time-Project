<?php include('../connect.php') ?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<body>
  <div class="main">
    <?php include('sidebar.php') ?>

    <div class="content">
      <div class="container">
        <h4>Quản lý phản hồi</h4>
        <table class="responsive-table">
          <tr>
            <td>Email</td>
            <td>Ý kiến phản hồi</td>
          </tr>
          <?php
          $query = "SELECT * FROM feedback ORDER BY id DESC";
          $result = mysqli_query($connect, $query);

          while ($rows = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $rows["email"] . "</td>";
            echo "<td>" . $rows["feedback_content"] . "</td>";
            echo '</tr>';
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</body>

</html>