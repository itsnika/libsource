<?php if (isset($_GET['error'])) {?><div class="error_div"><span class="error"><?php echo $_GET['error']; ?></span></div><?php }?>
<h1 class="selectbycaption">Search for a student:</h1>
<form class="form-inline" method="get" action="<?php echo BASE; ?>students/search">
  <div class="col-lg-6" id="inputSearch">
    <div class="input-group">
      <input type="text" class="form-control" name="query" placeholder="Search for: email, username">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit" type="button">Search</button>
      </span>
    </div>
  </div>
</form>
<br><br>
<div class="table-responsive">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Username</th>
        <th scope="col">Open</th>
      </tr>
    </thead>
    <tbody>
      <?php
foreach ($this->students as $key => $value) {
	$userid = $value['userid'];
	$firstname = $value['firstname'];
	$lastname = $value['lastname'];
	$email = $value['email'];
	$username = $value['username'];
	?>
      <tr>
        <td><?php echo $firstname; ?></td>
        <td><?php echo $lastname; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $username; ?></td>
        <td><a href="<?php echo BASE; ?>student/index/<?php echo $userid; ?>"><button class="btn btn-sm btn-success">Open</button></a></td>
      </tr>
      <?php
}
?>
    </tbody>
  </table>
</div>