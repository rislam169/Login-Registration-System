<?php 
	include 'lib/User.php';
	include 'inc/header.php';

	Session::checkSession();
?>
<?php 
	$loginmsg = Session::get('loginmsg');
	if (isset($loginmsg)) {
		echo $loginmsg;
	}
	Session::set('loginmsg', NULL);
?>


		<div class="card" style="margin-bottom: 30px;">
			<div class="card-header">
				<h2>User List <span class="float-right">Welcome! <strong>
					<?php
						$username = Session::get("username");
						if (isset($username)) {
							echo $username;						
						 }
					?>
				</strong></span></h2>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<tr>
						<th width="20%">Serial</th>
						<th width="20%">Name</th>
						<th width="20%">Username</th>
						<th width="20%">Email Address</th>
						<th width="20%">Action</th>
					</tr>
<?php
	$user = new User();
	$data = $user->getUeserData();
	if ($data) {
		$i=0;
		foreach ($data as $value) {
			$i++;
		
	
?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $value['name'];?></td>
						<td><?php echo $value['username'];?></td>
						<td><?php echo $value['email'];?></td>
						<td>
							<a class="btn btn-primary" href="profile.php?id=<?php echo $value['id'];?>">view</a>
						</td>
					</tr>
	<?php }}else{?>
				<tr><td colspan="5"><h2>No user data found....</h2></td></tr>	
<?php }?>
				</table>
			</div>
		</div>
<?php include 'inc/footer.php'; ?>