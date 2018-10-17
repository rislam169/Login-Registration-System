<?php 
	include 'lib/User.php';
	include 'inc/header.php';
	Session::checkSession();
?>
<?php
	if (isset($_GET['id'])) {
		$userid = (int)$_GET['id'];
	}
	$user = new User();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
		$updateuser = $user->updateUserData($userid, $_POST);
	}
?>

		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User Profile <span class="float-right"><a href="index.php" class="btn btn-primary">Back</a></span></h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
<?php 
	if (isset($updateuser)) {
		echo $updateuser;
	}
?>
<?php
	$userdata = $user->getUserById($userid);
	if ($userdata) {
		
	
?>
					<form method="POST" action="">
						<div class="form-group">
							<label for="name">Your Name</label>
							<input type="text" name="name" id="name" class="form-control" value="<?php echo $userdata->name?>">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control" value="<?php echo $userdata->username?>">
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="text" name="email" id="email" class="form-control" value="<?php echo $userdata->email?>">
						</div>
						<?php 
							$sessid = Session::get('id');
							if ($userid == $sessid) {
						?>
						<button type="submit" name="update" class="btn btn-success">Update</button>
						<a class="btn btn-info" href="changepass.php?id=<?php echo $_GET['id']; ?>">Change Password</a>
						<?php } ?>
					</form>
		<?php }?>
				</div>
			</div>
		</div>
<?php include 'inc/footer.php'; ?>