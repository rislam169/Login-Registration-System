<?php 
	include 'lib/User.php';
	include 'inc/header.php';
	Session::checkSession();
?>
<?php
	if (isset($_GET['id'])) {
		$userid = (int)$_GET['id'];
		$sessid = Session::get('id');
		if ($userid != $sessid) {
			header("Location: index.php");
		}

	}
	$user = new User();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])) {
		$updatepass = $user->updatePassword($userid, $_POST);
	}
?>

		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>Change Password <span class="float-right"><a href="profile.php?id=<?php echo $userid?>" class="btn btn-primary">Back</a></span></h2>
			</div>
			<div class="card-body">
				<div style="max-width: 600px; margin: 0 auto;">
<?php 
	if (isset($updatepass)) {
		echo $updatepass;
	}
?>

					<form method="POST" action="">
						<div class="form-group">
							<label for="old_pass">Old Password</label>
							<input type="password" name="old_pass" id="old_pass" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="new_pass">New Password</label>
							<input type="password" name="new_pass" id="new_pass" class="form-control"/>
						</div>
						<button type="submit" name="updatepass" class="btn btn-success">Update</button>
					</form>
				</div>
			</div>
		</div>
<?php include 'inc/footer.php'; ?>