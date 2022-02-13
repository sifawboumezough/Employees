<?php
    if(isset($_POST['submit'])) {
        $loginUser = new UsersController();
        $loginUser->log();
    }
 ?>

 <div class="container">
	<div class="row my-4">
		<div class="col-md-6 mx-auto">
			<?php include('./views/includes/alerts.php');?>
			<div class="card">
				<div class="card-header">
                    <h3 class="text-center">Login </h3>
                </div>
				</div>
				<div class="card-body bg-light">
			      	<form method="post" class="mr-1">
			      		<div class="form-group">
				      		<input type="text" name="username" placeholder="Username" class="form-control">
				      	</div>
				      	<div class="form-group">
				      		<input type="password" name="password" placeholder="Password" class="form-control">
				      	</div>
			      		<button name="submit" class="btn btn-sm btn-primary">Connect</button>
			      	</form>
				</div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL;?>register" class="btn btn-link">Sign-Up</a>
                </div>
			</div>
		</div>
	</div>
</div>
