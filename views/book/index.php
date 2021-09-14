<?php
if ($this->book == false) {
	header("location: " . BASE);
}
?>
<?php
if (isset($this->book)) {
	foreach ($this->book as $key => $value) {
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
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" id="bookdiv">
    <div class="panel panel-info">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3 col-lg-3 " align="center">
            <img alt="Book cover" draggable="false" src="<?php echo BASE; ?>assets/images/book-covers/<?php echo $bookpicture; ?>" class="img-thumbnail img-responsive">
          </div>
          <div class=" col-md-9 col-lg-9 ">
            <table class="table table-user-information">
              <tbody>
                <tr>
                  <td>Book title:</td>
                  <td><?php echo $title; ?></td>
                </tr>
                <tr>
                  <td>Author:</td>
                  <td><?php echo $author; ?></td>
                </tr>
                <tr>
                  <td>ISBN:</td>
                  <td><?php echo $isbn; ?></td>
                </tr>
                <tr>
                  <tr>
                    <td>Year:</td>
                    <td><?php echo $year; ?></td>
                  </tr>
                  <tr>
                    <td>Edition:</td>
                    <td><?php echo $edition; ?></td>
                  </tr>
                  <tr>
                    <td>Language:</td>
                    <td><?php echo $language; ?></td>
                  </tr>
                  <tr>
                    <td>Category:</td>
                    <td><?php echo $category; ?></td>
                  </tr>
                  <tr>
                    <td>Shelf:</td>
                    <td><?php echo $shelf; ?></td>
                  </tr>
                  <?php if ($copies > 0) {?>
                  <tr id="bookdetstatusavailable">
                    <?php } else {?>
                    <tr id="bookdetstatustaken">
                      <?php }?>
                      <td>Copies available:</td>
                      <td><?php echo $copies . " out of " . $originalcopies; ?></td>
                    </tr>
                  </tr>
                </tbody>
              </table>
              <?php
$loggedIn = Session::get('loggedIn');
$admin = Session::get('admin');
if ($loggedIn == true && $admin == false) {
	?>
              <?php if ($copies == 0) {?>
              <?php if (isset($useridDetails) && isset($bookidDetails)) {?>
              <?php if ($useridDetails == Session::get("userid") && $bookidDetails == $bookid) {?>
              <span class="spannobook">* One copy reserved by you.</span>
              <br><br>
              <a href="<?php echo BASE; ?>book/unreserve/<?php echo $bookid; ?>" class="btn btn-primary">Unreserve this book</a>
              <?php } else {?>
              <span class="spannobook">* You can not reserve this book because there are not copies available at the moment.</span>
              <br><br>
              <a href="<?php echo BASE; ?>book/index/<?php echo $bookid; ?>" class="btn btn-primary disabled">Reserve this book</a>
              <?php }?>
              <?php } else {?>
              <span class="spannobook">* You can not reserve this book because there are not copies available at the moment.</span>
              <br><br>
              <a href="<?php echo BASE; ?>book/index/<?php echo $bookid; ?>" class="btn btn-primary disabled">Reserve this book</a>
              <?php }?>
              <?php }?>
              <?php if ($copies > 0) {?>
              <?php if (isset($useridDetails) && isset($bookidDetails)) {?>
              <?php if ($useridDetails == Session::get("userid") && $bookidDetails == $bookid) {?>
              <span class="spannobook">* One copy reserved by you.</span>
              <br><br>
              <a href="<?php echo BASE; ?>book/unreserve/<?php echo $bookid; ?>" class="btn btn-primary">Unreserve this book</a>
              <?php } else {?>
              <?php if (isset($useridDetails)) {?>
              <?php if ($useridDetails == Session::get("userid")) {?>
              <span class="spannobook">* You have already reserved a book.</span>
              <br><br>
              <a href="<?php echo BASE; ?>book/index/<?php echo $bookid; ?>" class="btn btn-primary disabled">Reserve this book</a>
              <?php } else {?>
              <a href="<?php echo BASE; ?>book/reserve/<?php echo $bookid; ?>" class="btn btn-primary">Reserve this book</a>
              <?php }?>
              <?php } else {?>
              <a href="<?php echo BASE; ?>book/reserve/<?php echo $bookid; ?>" class="btn btn-primary">Reserve this book</a>
              <?php }?>
              <?php }?>
              <?php } else {?>
              <?php if (isset($useridDetails)) {?>
              <?php if ($useridDetails == Session::get("userid")) {?>
              <span class="spannobook">* You have already reserved a book.</span>
              <br><br>
              <a href="<?php echo BASE; ?>book/index/<?php echo $bookid; ?>" class="btn btn-primary disabled">Reserve this book</a>
              <?php } else {?>
              <a href="<?php echo BASE; ?>book/reserve/<?php echo $bookid; ?>" class="btn btn-primary">Reserve this book</a>
              <?php }?>
              <?php } else {?>
              <a href="<?php echo BASE; ?>book/reserve/<?php echo $bookid; ?>" class="btn btn-primary">Reserve this book</a>
              <?php }?>
              <?php }?>
              <?php }?>
              <?php }?>
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