<?php include('../connect.php') ?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<?php include('../connect.php') ?>

<body>
<div class="main">
    <?php include('sidebar.php') ?>

    <div class="content">
        <div class="container">
            <h4>Sửa sản phẩm</h4>
            <form method="POST">
                <?php
                $id = $_GET["id"];
                $query = "SELECT * FROM products WHERE id=$id";
                $result = mysqli_query($connect, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="input-field col s12">
                        <input id="productName" type="text" class="validate" name="productName"
                               value="<?php echo $rows["name"] ?>" required>
                        <label for="productName">Tên sản phẩm</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="productPrice" type="text" class="validate" name="productPrice"
                               value="<?php echo $rows["price"] ?>" required>
                        <label for="productPrice">Giá sản phẩm</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="productLink" type="text" class="validate" name="productLink"
                               value="<?php echo $rows["image"] ?>" required>
                        <label for="productLink">Link ảnh sản phẩm</label>
                    </div>
                    <textarea name="productDetail"><?php echo $rows["description"] ?></textarea>
                    <script>
                        CKEDITOR.replace('productDetail')
                    </script>
                    <?php
                }
                ?>
                <button type="submit" name="submit" class="btn red" onclick="M.toast({html: 'Sửa thành công'})">Sửa
                </button>
            </form>

            <?php
            if (isset($_POST["submit"])) {
                $productName = $_POST['productName'];
                $productPrice = $_POST['productPrice'];
                $productLink = $_POST['productLink'];
                $productDetail = $_POST['productDetail'];

                $query2 = "UPDATE products SET name = '$productName', price = '$productPrice', image = '$productLink', description = '$productDetail' WHERE id=$id";
                mysqli_query($connect, $query2);
            }
            ?>

        </div>
    </div>
</div>
</body>

</html>