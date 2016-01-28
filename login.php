<?php
session_start();
require_once "config/config.php";
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if($username===USERNAME && $password===PASSWORD){
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		header("location:/");
	}else{
		$status = "Wrong Username or Password!";
		
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Login</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="img/favicon.ico" rel="icon" type="image/gif"/>
	<script src="js/js.js"></script>
</head>
<body>
	<div class="login">
		<?php include "view/header.tmp.php"; ?>
		<hr>
		<div class="Login">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<fieldset>
					<legend style="font-weight:bolder;">Member login</legend>
					<?php
					if($status){ ?>
					<span style="color:white; text-align:center; background-color:red; padding:5px 5px;"><?php echo $status; ?></span>
					<?php } ?>
					<ul>
						<li><label for="username">Login ID</label>
							<input type="text" name="username" id="username" autocomplete="off" autofocus accesskey="u" tabindex="1">
						</li>
						<li><label for="password">Secret ID</label>
							<input type="password" name="password" id="password" accesskey="p" tabindex="2">
						</li>
						<li style="padding-left:20%;"><input type="submit" value="Login">&nbsp;<input type="reset" onclick="reload();" value="Reset"></li>

					</ul>

				</fieldset>
			</form>
		</div>
	</div>
		
</body>
</html>
