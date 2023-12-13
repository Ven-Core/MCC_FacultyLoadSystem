<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="img/MCC_LOGO.ico" type="image/x-icon">

  <title>School Faculty Scheduling System</title>

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id'])){
    // You should replace 'faculty' with the actual folder or identifier for faculty users
    if($_SESSION['user_type'] == 'faculty'){
        header("location:./dashboard.php");
    } else {
        header("location:index.php?page=home");
    }
}
?>

</head>
<style>
	body{
		margin-top: 10px;
		background-image: url('img/mccbgbg1.jpg');
		align-items: center;
		overflow: hidden;
		background-size: cover;
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right: 400px;
		width:40%;
		height: calc(100%);
		display: flex;
		align-items: center;
		opacity: 80px;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		display: flex;
		align-items: center;
		background-repeat: no-repeat;
		background-size: cover;
		opacity: 100;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}

	.logo {
		margin: auto;
		font-size: 8rem;
		background: white;
		padding: .5em 0.7em;
		border-radius: 50% 50%;
		z-index: 10;
	}
</style>

<body>
  <main id="main" class="bg-success">
		<div id="login-left">
		</div>

		<div id="login-right">
			<div class="card col-md-8">
				<div class="card-body">
						
					<form id="login-form" >
						<div class="form-group">
							<label for "username" class="control-label">Username</label>
							<input type="text" id="username" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for "password" class="control-label">Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
					</form>
				</div>
			</div>
		</div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
			},
			success: function(resp) {
				if (resp == 1) {
					location.href ='index.php?page=home';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>
