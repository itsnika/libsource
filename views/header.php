<!Doctype HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Libsource. A book reserving library system.">
        <meta name="author" content="Gerald Nika">
        <title><?=(isset($this->title)) ? $this->title : 'Libsource';?></title>
        <link rel="icon" type="image/x-icon" href="<?php echo BASE; ?>assets/images/icon.png">
        <link rel="stylesheet" href="<?php echo BASE; ?>assets/css/default.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/sunny/jquery-ui.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE; ?>assets/js/custom.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <?php if (isset($this->js)) {foreach ($this->js as $js) {echo '<script type="text/javascript" src="' . BASE . 'views/' . $js . '.js"></script>';}}?>
    </head>
    <body>
        <?php Session::init();?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <?php if (Session::get('loggedIn') == false && Session::get('admin') == false): ?>
            <a href="<?php echo BASE; ?>">
                <img src="<?php echo BASE; ?>assets/images/logo.png" draggable="false" class="library-icon">
            </a>
            <a class="navbar-brand" href="<?php echo BASE; ?>">Libsource</a>
            <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>">Index</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>login">Login</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>register">Register</a>
                </div>
            </div>
            <?php endif;?>
            <?php if (Session::get('loggedIn') == true && Session::get('admin') == false): ?>
            <a href="<?php echo BASE; ?>home">
                <img src="<?php echo BASE; ?>assets/images/logo.png" draggable="false" class="library-icon">
            </a>
            <a class="navbar-brand" href="<?php echo BASE; ?>home">Libsource</a>
            <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>home/index/<?php echo Session::get('userid'); ?>">Home</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>profile/index/<?php echo Session::get('userid'); ?>">Profile</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>search">Search</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>settings/index/<?php echo Session::get('userid'); ?>">Settings</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>home/logout">Logout</a>
                </div>
            </div>
            <?php endif;?>
            <?php if (Session::get('admin') == true && Session::get('loggedIn') == false): ?>
            <a href="<?php echo BASE; ?>admin">
                <img src="<?php echo BASE; ?>assets/images/logo.png" draggable="false" class="library-icon">
            </a>
            <a class="navbar-brand" href="<?php echo BASE; ?>admin">Libsource</a>
            <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>admin/index/<?php echo Session::get('id'); ?>">Admin</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>add">Add book</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>allbooks">All Books</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>search">Search</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>students">Students</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>booksreserved">Books reserved</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>settings/index/<?php echo Session::get('id'); ?>">Settings</a>
                    <a class="nav-item nav-link" href="<?php echo BASE; ?>admin/logout">Logout</a>
                </div>
            </div>
            <?php endif;?>
        </nav>
        <main role="main" class="container">