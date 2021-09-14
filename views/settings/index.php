<?php if (Session::get('loggedIn') == true && Session::get('admin') == false): ?>
<?php
foreach ($this->student as $key => $value) {
	$userid = $value['userid'];
	$firstname = $value['firstname'];
	$lastname = $value['lastname'];
	$email = $value['email'];
	$username = $value['username'];
	$password = $value['password'];
}
?>
<?php endif;?>
<?php if (Session::get('loggedIn') == false && Session::get('admin') == true): ?>
<?php
foreach ($this->admin as $key => $value) {
	$userid = $value['id'];
	$firstname = $value['firstname'];
	$lastname = $value['lastname'];
	$email = $value['email'];
	$username = $value['username'];
	$password = $value['password'];
}
?>
<?php endif;?>
<?php if (isset($_GET['error'])) {?><div class="error_div"><span class="error"><?php echo $_GET['error']; ?></span></div><?php }?>
<div class="rowsettings">
  <form method="get" class="settingsform" action="<?php echo BASE; ?>settings/saveFirstName/<?php echo $userid; ?>">
    <div class="col-3" id="settingsleftcol">First Name: </div>
    <div class="col-6">
      <input class="form-control form-control-sm" type="text" name="firstname" placeholder="<?php echo $firstname; ?>">
    </div>
    <div class="col-3" id="settingsrightcol">
      <input type="submit" value="Save" class="btn btn-sm btn-success">
    </div>
  </form>
</div>
<div class="rowsettings">
  <form method="get" class="settingsform" action="<?php echo BASE; ?>settings/saveLastName/<?php echo $userid; ?>">
    <div class="col-3" id="settingsleftcol">Last Name: </div>
    <div class="col-6">
      <input class="form-control form-control-sm" type="text" name="lastname" placeholder="<?php echo $lastname; ?>">
    </div>
    <div class="col-3" id="settingsrightcol">
      <input type="submit" value="Save" class="btn btn-sm btn-success">
    </div>
  </form>
</div>
<div class="rowsettings">
  <form method="get" class="settingsform" action="<?php echo BASE; ?>settings/saveEmail/<?php echo $userid; ?>">
    <div class="col-3" id="settingsleftcol">Email: </div>
    <div class="col-6">
      <input class="form-control form-control-sm" type="email" name="email" placeholder="<?php echo $email; ?>">
    </div>
    <div class="col-3" id="settingsrightcol">
      <input type="submit" value="Save" class="btn btn-sm btn-success">
    </div>
  </form>
</div>
<div class="rowsettings">
  <form method="get" class="settingsform" action="<?php echo BASE; ?>settings/saveUsername/<?php echo $userid; ?>">
    <div class="col-3" id="settingsleftcol">Username: </div>
    <div class="col-6">
      <input class="form-control form-control-sm" type="text" name="username" placeholder="<?php echo $username; ?>">
    </div>
    <div class="col-3" id="settingsrightcol">
      <input type="submit" value="Save" class="btn btn-sm btn-success">
    </div>
  </form>
</div>
<div class="rowsettings">
  <form method="post" class="settingsform" action="<?php echo BASE; ?>settings/savePassword/<?php echo $userid; ?>">
    <div class="col-3" id="settingsleftcol">Password: </div>
    <div class="col-6">
      <input class="form-control form-control-sm" type="password" name="password" placeholder="**********">
    </div>
    <div class="col-3" id="settingsrightcol">
      <input type="submit" value="Save" class="btn btn-sm btn-success">
    </div>
  </form>
</div>
<div class="rowsettings">
  <div class="col-3" id="settingsleftcol"></div>
  <div class="col-5"></div>
  <div class="col-2" id="settingsrightcol">
    <a href="<?php echo BASE; ?>settings/delete/<?php echo $userid; ?>">
      <input type="submit" value="Close Account" name="delete" class="btn btn-sm btn-danger" id="deleteaccbtn">
    </a>
  </div>
</div>