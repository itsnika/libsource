<?php
if ($this->admin == false) {
	header("location: " . BASE);
}
?>
<?php
foreach ($this->admin as $key => $value) {
	$firstname = $value['firstname'];
	$lastname = $value['lastname'];
	$email = $value['email'];
	$username = $value['username'];
}
?>
<div class="d-flex justify-content-left" id="profile_flex">
  <img src="<?php echo BASE; ?>assets/images/profile.png" draggable="false" class="profileimage">
  <div class="profilecredholder">
    <h1 class="profilename"><?php echo $firstname . " " . $lastname; ?> <b class="badmin">(Admin)</b></h1>
    <p class="profiledet"><?php echo $email; ?></p>
    <p class="profiledet"><?php echo $username; ?></p>
  </div>
</div>