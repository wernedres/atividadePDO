<?php include_once 'restrito_login.php'; ?>
<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>


<div>

<div class="container">
  
	<?php
	 if(!isset($_GET['page']))
	require_once("home.php");
	else
	require_once($_GET['page'].".php");
	?>
</div>


</div>

<?php include_once 'footer.php' ?>