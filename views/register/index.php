<form class="form-register" action="<?php echo BASE; ?>register/register" method="post">
      <a href="<?php echo BASE; ?>">
            <img class="mb-4" src="<?php echo BASE; ?>assets/images/logo.png" draggable="false" alt="" id="logo-mini" width="72" height="72">
      </a>
      <input type="text" name="firstname" id="inputFirstName" class="form-control" placeholder="First name" required autofocus>
      <br>
      <input type="text" name="lastname" id="inputLastName" class="form-control" placeholder="Last name" required>
      <br>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
      <br>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required>
      <br>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <p class="mt-5 mb-4 text-muted">By clicking Register you agree to our <a href="<?php echo BASE; ?>policies/conds">Terms and Conditions</a> and <a href="<?php echo BASE; ?>policies/cookies">Cookies Policy.</a></p>
      <button class="btn btn-lg btn-primary btn-block" name="register" type="submit">Register</button>
      <?php if (isset($_GET['error'])) {?><div class="error_div"><span class="error"><?php echo $_GET['error']; ?></span></div><?php }?>
      <p class="mt-5 mb-3 text-muted">Already have an account? <a href="<?php echo BASE; ?>login">Login.</a></p>
</form>