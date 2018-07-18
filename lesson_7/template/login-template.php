<div class="wrap-login_block">
  <h1>Авторизуйтесь пожалуйста</h1>
  <p><?=$errorMessage?></p>
  <form method="post">
    <input type="hidden" name="type_auth" value="in">
    <input type="text" name="login" placeholder="Ваш логин" required pattern="[A-Za-z][A-Za-z_\-\d]{2,}">
    <input type="password" name="pass" placeholder="Ваш пароль" required pattern="[A-Za-z_\-\d]{3,}">
    <input type="submit" value="Войти">
  </form>
</div>