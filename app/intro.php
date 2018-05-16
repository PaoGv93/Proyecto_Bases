<?php
 //entry.php
 session_start();
 if(!isset($_SESSION["username"]))
 {
      header("location:index.php?action=login");
 }
 ?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Intro</title>
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php
			require_once "../models/Usuario.php";
			$db = new Database;
			$user = new Usuario($db);
			$users = $user->get();
	?>
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="pull-right">
				<a class="btn btn-secondary" role="button" href="<?php echo Usuario::baseurl() ?>app/logout.php">logout</a>
			</div>
			<?php
				echo '<h1>Welcome - '.$_SESSION["username"].'</h1>';
				?>

		</div>
	</nav>
<br><br>
	<div id="fh5co-work">
		<div class="container"><div class="row">
		  <div class="col-md-6 text-center animate-box">
		    <a class="work" href="listUsuario.php">
		      <div class="work-grid" style="background-image:url(images/project-1.jpg);">
		        <div class="inner">
		          <div class="desc">
		          <h3>Users</h3>
		          <span class="cat">users</span>
		        </div>
		        </div>
		      </div>
		    </a>
		  </div>

  <div class="col-md-6 text-center animate-box">
    <a class="work" href="listProyecto.php">
      <div class="work-grid" style="background-image:url(images/project-2.jpg);">
        <div class="inner">
          <div class="desc">
            <h3>Proyectos</h3>
            <span class="cat">proyectos</span>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
</body>
</html>
