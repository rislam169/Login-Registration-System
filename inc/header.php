<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/Session.php';
	Session::init();
?>

</!DOCTYPE html>
<html>
<head>
	<title>Login Register System</title>
	<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
	<script type="text/javascript" src="inc/jquery.min.js"></script>
	<script type="text/javascript" src="inc/bootstrap.min.js"></script>
	<style type="text/css">
		a{
			color: black;
		}
		.bg-light {
		    background-color: #F2F2F2!important;
		}
	</style>
</head>
<?php
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		Session::destroy();
	}
?>

<body>
	<div class="container">
		<nav class="navbar bg-light navbar-default" style="margin-bottom: 30px; font-color: black;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Login Register System</a>
				</div>
				<ul class="nav justify-content-center pull-right">
					<?php
						$id = Session::get("id");
						$userlogin = Session::get("login");
						if($userlogin == true){
					?>
					<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="profile.php?id=<?php echo $id;?>">Profile</a></li>
					<li class="nav-item"><a class="nav-link" href="?action=logout">Logout</a></li>
					<?php }else{ ?>
					<li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>
					<li class="nav-item"><a class="nav-link" href="Register.php">Register</a></li>
					<?php }?>
				</ul>
			</div>
		</nav>