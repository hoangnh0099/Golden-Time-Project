<?php include('connect.php') ?>

<!DOCTYPE html>
<html>

<?php include('header.php') ?>

<body>
  <div class="main">

    <?php include('sidebar.php') ?>

    <div class="content">
      <form method="POST" class="container">
        <h4>Phản hồi</h4>
        <div class="row">
        <div class="input-field col s12">
            <input type="email" id="email" class="materialize-textarea" name="email" required>
            <label for="email">Email</label>
          </div>
          <div class="input-field col s12">
            <textarea id="feedbackContent" class="materialize-textarea" name="feedbackContent" required></textarea>
            <label for="feedbackContent">Chúng tôi có thể giúp gì được cho bạn ?</label>
          </div>
          <button type="submit" name="submit" class="btn red waves-effect">Phản hồi</button>
        </div>
      </form>

      <?php
        if (isset($_POST["submit"])) {
          $email = $_POST["email"];
          $feedbackContent = $_POST["feedbackContent"];
          $query = "INSERT INTO feedback (email, feedback_content) VALUES ('$email', '$feedbackContent')";
          mysqli_query($connect, $query);
        }
      ?>
      
    </div>
  </div>
</body>

</html>