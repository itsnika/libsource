<?php
if ($this->student == false) {
	header("location: " . BASE);
}
?>
<?php Session::init();?>
<?php if (Session::get('loggedIn') == true && Session::get('admin') == false): ?>
<?php
if (isset($this->student)) {
	foreach ($this->student as $key => $value) {
		$firstname = $value['firstname'];
		$lastname = $value['lastname'];
		$email = $value['email'];
		$username = $value['username'];
	}
}
?>
<div class="d-flex justify-content-left" id="profile_flex">
  <img src="<?php echo BASE; ?>assets/images/profile.png" draggable="false" class="profileimage">
  <div class="profilecredholder">
    <h1 class="profilename"><?php echo $firstname . " " . $lastname; ?></h1>
    <p class="profiledet"><?php echo $email; ?></p>
    <p class="profiledet"><?php echo $username; ?></p>
  </div>
</div>
<?php
if (isset($this->orderedbook)) {
	foreach ($this->orderedbook as $key => $value) {
		$bookid = $value['bookid'];
		$title = $value['title'];
		$author = $value['author'];
		$isbn = $value['isbn'];
		$year = $value['year'];
		$edition = $value['edition'];
		$language = $value['language'];
		$category = $value['category'];
		$bookpicture = $value['bookpicture'];
		$shelf = $value['shelf'];
		$copies = $value['copies'];
		$originalcopies = $value['originalcopies'];
	}
}
?>
<?php
if (isset($this->details)) {
	foreach ($this->details as $key => $value) {
		$useridDetails = $value['userid'];
		$bookidDetails = $value['bookid'];
		$ordereddateDetails = $value['ordereddate'];
	}
}
?>
<?php if (isset($this->orderedbook)) {
	?>
<h1 class="orderedbookcaption">Ordered Book:</h1>
<div class="row">
  <div class="col-md-4">
    <div class="card mb-4 box-shadow" id="cardbook">
      <img class="orderedimage" draggable="false" src="<?php echo BASE; ?>assets/images/book-covers/<?php echo $bookpicture; ?>">
      <div class="card-body">
        <h1 class="booktitle"><?php echo $title; ?></h1>
        <p class="card-text" id="bookdet">Author: <?php echo $author; ?></p>
        <p class="card-text" id="bookdet">ISBN: <?php echo $isbn; ?></p>
        <p class="card-text" id="bookdet">Year: <?php echo $year; ?></p>
        <p class="card-text" id="bookdet">Edition: <?php echo $edition; ?></p>
        <p class="card-text" id="bookdet">Language: <?php echo $language; ?></p>
        <p class="card-text" id="bookdet">Category: <?php echo $category; ?></p>
        <p class="card-text" id="bookdet">Shelf: <?php echo $shelf; ?></p>
        <p class="card-text" id="bookdet">Ordered date: <?php echo $ordereddateDetails; ?></p>
        <p class="card-text" id="bookdet">Return date: <?php echo date('Y-m-d', strtotime("+30 days", strtotime($ordereddateDetails))); ?></p>
        <?php if ($copies > 0) {?>
        <p class="card-text" id="bookdetstatusavailable">Number of copies available: <?php echo $copies . " out of " . $originalcopies; ?></p>
        <?php } else {?>
        <p class="card-text" id="bookdetstatustaken">Number of copies available: <?php echo $copies . " out of " . $originalcopies; ?></p>
        <?php }?>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a href="<?php echo BASE; ?>book/index/<?php echo $bookid; ?>" target="_blank"><button type="button" class="btn btn-sm btn-outline-secondary" id="openbook">Open book</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<h1 class="morelikethiscaption">More Like This:</h1>
<div class="row">
  <?php
if (isset($this->moreLikeThis)) {
		foreach ($this->moreLikeThis as $key => $value) {
			$bookid = $value['bookid'];
			$title = $value['title'];
			$author = $value['author'];
			$isbn = $value['isbn'];
			$year = $value['year'];
			$edition = $value['edition'];
			$language = $value['language'];
			$category = $value['category'];
			$bookpicture = $value['bookpicture'];
			$shelf = $value['shelf'];
			$copies = $value['copies'];
			$originalcopies = $value['originalcopies'];
			?>
  <div class="col-md-4">
    <div class="card mb-4 box-shadow" id="cardbook">
      <img class="orderedimage" draggable="false" src="<?php echo BASE; ?>assets/images/book-covers/<?php echo $bookpicture; ?>">
      <div class="card-body">
        <h1 class="booktitle"><?php echo $title; ?></h1>
        <p class="card-text" id="bookdet">Author: <?php echo $author; ?></p>
        <p class="card-text" id="bookdet">ISBN: <?php echo $isbn; ?></p>
        <p class="card-text" id="bookdet">Year: <?php echo $year; ?></p>
        <p class="card-text" id="bookdet">Edition: <?php echo $edition; ?></p>
        <p class="card-text" id="bookdet">Language: <?php echo $language; ?></p>
        <p class="card-text" id="bookdet">Category: <?php echo $category; ?></p>
        <p class="card-text" id="bookdet">Shelf: <?php echo $shelf; ?></p>
        <?php if ($copies > 0) {?>
        <p class="card-text" id="bookdetstatusavailable">Number of copies available: <?php echo $copies . " out of " . $originalcopies; ?></p>
        <?php } else {?>
        <p class="card-text" id="bookdetstatustaken">Number of copies available: <?php echo $copies . " out of " . $originalcopies; ?></p>
        <?php }?>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a href="<?php echo BASE; ?>book/index/<?php echo $bookid; ?>" target="_blank"><button type="button" class="btn btn-sm btn-outline-secondary" id="openbook">Open book</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }}?>
</div>
<?php }?>
<?php endif;?>