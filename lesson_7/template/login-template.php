<div class="wrap-login_block">
  <h1>Авторизуйтесь пожалуйста</h1>
  <p><?=$errorMessage?></p>
  <form method="post">
    <input type="hidden" name="type_auth" value="in">
    <input type="text" name="login" placeholder="Ваш логин" required>
    <input type="password" name="pass" placeholder="Ваш пароль" required>
    <input type="submit" value="Войти">
  </form>
</div>