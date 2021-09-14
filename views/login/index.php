<form class="form-login" action="<?php echo BASE; ?>login/login" method="post">
      <a href="<?php echo BASE; ?>">
            <img class="mb-4" src="<?php echo BASE; ?>assets/images/logo.png" draggable="false" alt="" id="logo-mini" width="72" height="72">
      </a>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
      <br>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <br><br>
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Log in</button>
      <?php if (isset($_GET['error'])) {?><div class="error_div"><span class="error"><?php echo $_GET['error']; ?></span></div><?php }?>
      <p class="mt-4 mb-3 text-muted">Don't have an account? <a href="<?php echo BASE; ?>register">Register.</a></p>
</form>