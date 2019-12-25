<?php include('connect.php') ?>

<!DOCTYPE html>
<html>
<?php include('header.php') ?>

<body>
  <div class="main">
    <?php include('sidebar.php') ?>

    <div class="content">
      <?php include('userBox.php') ?>

      <?php include('carousel.php') ?>

      <div class="products-area">
        <div class="row">
          
          <?php 
            $search = $_GET["search"];
            $query = "SELECT * FROM products WHERE name like '%$search%'";
            $result = mysqli_query($connect, $query);

            $num = mysqli_num_rows($result);

            if ($num > 0 && $search != "") {
              while ($rows = mysqli_fetch_assoc($result)) {
                echo "<div class='col s12 m3'>";
                echo "<div class='card'>";
                echo "<div class='card-image'>";
                echo "<img src='".$rows["image"]."'>";
                echo "<a class='btn-floating halfway-fab waves-effect waves-light red'>";
                echo "<i class='material-icons'>add</i>";
                echo "</a>";
                echo "</div>";
                echo "<div class='card-content'>";
                echo "<a href='detail.php?id=".$rows["id"]."' class='card-title'>".$rows["name"]."</a>";
                echo "<p> Giá: ".$rows["price"]." đ</p>";
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            }
          ?>

        </div>
      </div>
    </div>
  </div>
</body>

</html>