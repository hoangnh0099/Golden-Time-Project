<div class="user-area">
  <div class="user-box">
    <img src="assets/images/user.png" class="user-avatar">
    <a class="waves-effect waves-light btn-flat modal-trigger" href="#modal1">Đăng nhập</a>
  </div>
</div>

<div id="modal1" class="modal">
  <div class="row">
    <div class="col m12">
      <ul class="tabs">
        <li class="tab col s6 m6">
          <a href="#signIn">Đăng nhập</a>
        </li>
        <li class="tab col s6 m6">
          <a href="#signUp">Đăng ký</a>
        </li>
      </ul>
    </div>

    <div id="signIn" class="col s12">
      <form method="POST" action="signIn.php" class="container">
        <div class="input-field col s12">
          <input id="username" type="email" name="username" class="validate" required>
          <label for="username">Tên đăng nhập</label>
        </div>
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate" required>
          <label for="password">Mật khẩu</label>
        </div>
        <button type="submit" name="submit" class="btn red">Đăng nhập</button>
      </form>
    </div>

    <div id="signUp" class="col s12">
      <form method="POST" action="signUp.php" class="container">
        <div class="input-field col s12">
          <input id="username" type="text" name="username" class="validate" required>
          <label for="username">Tên đăng nhập</label>
        </div>
        <div class="input-field col s12">
          <input id="fullname" type="text" name="fullname" class="validate" required>
          <label for="fullname">Họ và tên</label>
        </div>
        <p>
          <label>
            <input name="sex" type="radio" value="1" />
            <span>Nam</span>
          </label>
          <label>
            <input name="sex" type="radio" value="0" />
            <span>Nữ</span>
          </label>
        </p>
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate" required>
          <label for="password">Mật khẩu</label>
        </div>
        <div class="input-field col s12">
          <input id="repassword" type="password" name="repassword" class="validate" required>
          <label for="repassword">Nhập lại mật khẩu</label>
        </div>
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input id="phone" type="text" name="phone" class="validate" required>
          <label for="phone">Số điện thoại</label>
        </div>
        <div class="input-field col s12">
          <input id="address" type="text" name="address" class="validate" required>
          <label for="address">Địa chỉ</label>
        </div>
        <button type="submit" name="submit" class="btn red">Đăng ký</button>
      </form>
    </div>
  </div>
</div>