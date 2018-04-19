<?php 
include('config.php');
?>

<html>
<head>
<title>Nikita Laundry</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/Sticky-footer-styles.css" rel="stylesheet">

</head>

<body>
<hr>

<div class="container">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<?php 
			if (!empty($_GET['message']) && $_GET['message'] == 'success') {
				echo '<center><h3>Data berhasil diubah !</h3></center>';
			} else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
				echo '<center><h3>Data berhasil dihapus !</h3></center>';
			} else if (!empty($_GET['message']) && $_GET['message'] == 'insert') {
				echo '<center><h3>Data berhasil ditambah !</h3></center>';
			} 
		?>
		<div style="border-bottom:solid #4ECDC4 5px;">&nbsp;</div>
		<center><br><h5><a href="//localhost/smartcity_backend/view/admin/">Lihat Data</a></h5></center>
	</div>
	<div class="col-lg-4"></div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>

</body>
</html>