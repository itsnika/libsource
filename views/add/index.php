<form class="form-register" method="post" action="<?php echo BASE; ?>add/addBook" enctype="multipart/form-data">
	<label><b>Add Book:</b></label>
	<br>
	<input type="text" name="title" id="inputFirstName" class="form-control" placeholder="Book title" required autofocus>
	<br>
	<input type="text" name="author" id="inputLastName" class="form-control" placeholder="Author" required>
	<br>
	<input type="text" name="isbn" id="inputEmail" class="form-control" placeholder="ISBN" required>
	<br>
	<input type="number" name="year" id="inputUsername" min="1400" max="<?php echo date('Y'); ?>" class="form-control" placeholder="Year" required>
	<br>
	<input type="number" name="edition" id="inputUsername" min="1" class="form-control" placeholder="Edition" required>
	<br>
	<input type="number" name="copies" id="inputUsername" min="1" class="form-control" placeholder="Copies" required>
	<br>
	<div class="form-group">
		<label for="exampleFormControlSelect2">Language</label>
		<select class="form-control" id="inputUsername" name="language" required>
			<option value="English">English</option>
			<option value="Albanian">Albanian</option>
		</select>
	</div>
	<div class="form-group">
		<label for="exampleFormControlSelect1">Category</label>
		<select class="form-control" id="inputUsername" name="category" required>
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
	<div class="form-group">
		<label>Upload Book Cover Image</label>
		<div class="input-group" id="coveruploadgroup">
			<span class="input-group-btn">
				<span class="btn btn-default btn-file" id="fileinputspan"><input type="file" name="cover" id="imgInp" required></span>
			</span>
		</div>
	</div>
	<br><br>
	<input class="btn btn-lg btn-primary btn-block" value="Add Book" name="addBtn" type="submit">
	<?php if (isset($_GET['error'])) {?><div class="error_div"><span class="error"><?php echo $_GET['error']; ?></span></div><?php }?>
</form>