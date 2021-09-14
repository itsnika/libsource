<?php if (isset($_GET['error'])) {?><div class="error_div"><span class="error"><?php echo $_GET['error']; ?></span></div><?php }?>
<h1 class="selectbycaption">Search for a book:</h1>
<form class="form-inline" method="get" action="<?php echo BASE; ?>results/index">
  <div class="form-group">
    <select class="form-control" id="inputUsername" name="category">
      <option value="categ">All</option>
      <option value="Generalities">Generalities</option>
      <option value="Philosophy and Psychology">Philosophy and Psychology</option>
      <option value="Religion">Religion</option>
      <option value="Social Sciences">Social Sciences</option>
      <option value="Language">Language</option>
      <option value="Natural Sciences and Mathematics">Natural Sciences and Mathematics</option>
      <option value="Technology (Applied Science)">Technology (Applied Science)</option>
      <option value="The Arts">The Arts</option>
      <option value="Literature and Rhetoric">Literature and Rhetoric</option>
      <option value="Geography and History">Geography and History</option>
    </select>
  </div>
  &nbsp;&nbsp;&nbsp;
  <div class="col-lg-6" id="inputSearch">
    <div class="input-group">
      <input type="text" class="form-control" name="query" placeholder="Search for: title, author, isbn">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit" type="button">Search</button>
      </span>
    </div>
  </div>
</form>