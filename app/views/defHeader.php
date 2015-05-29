<!DOCTYPE html>
<html>
<head>
  <title>
   <?php echo isset($view_head_title) ? $view_head_title : 'helloworld';?>
  </title>
  <link rel="stylesheet" media="all" href="<?php echo trim(__ROOT_URL, 'index.php') . 'public/styles/main.css';?>"/>
  <script src="<?php echo trim(__ROOT_URL, 'index.php') . 'public/scripts/jquery.js';?>"></script>
  <script src="<?php echo trim(__ROOT_URL, 'index.php') . 'public/scripts/jquery.ujs.js';?>"></script>
</head>
<body>
<!-- <p>Header</p> -->