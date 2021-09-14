<h1 class="selectbycaption">Results: <?php echo isset($this->count) ? $this->count : null; ?></h1>
<div class="row">
  <?php
if (isset($this->byCategory)) {
	foreach ($this->byCategory as $key => $value) {
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
  <?php
}
}
?>
  <?php
if (isset($this->byQuery)) {
	foreach ($this->byQuery as $key => $value) {
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
  <?php
}
}
?>
  <?php
if (isset($this->byCategoryAndQuery)) {
	foreach ($this->byCategoryAndQuery as $key => $value) {
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
  <?php
}
}
?>
</div>