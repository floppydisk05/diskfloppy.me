
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global -->
	<?php require('../inc/header.inc.php'); ?>

	<!-- Page-specific -->
	<?php require_once('../inc/title.inc.php') ?>
	<!--<link rel="shortcut icon" href="../res/img/icons/ico/calc.ico" type="image/x-icon">-->
	<meta property="og:title" content="title">
	<meta property="og:description" content="description">
	<!--<meta property="og:image" content="/res/img/icons/png/computer.png">-->
</head>
<body>
<div class="page">  
<?php require('../inc/nav.inc.php') ?>

<div id="pagebody">
	<div id="content">

	</div> <!-- content -->

	<div id="footer" class="pagefooter">
		<?php $file = __FILE__;require('../inc/footer.inc.php'); ?>
	</div> <!-- footer -->
</div> <!-- pagebody -->
</div> <!-- page -->
</body>
</html>
