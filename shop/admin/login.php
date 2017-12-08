<?php
include "../classes/Adminlogin.php";
?>
<?php
	//creating a obj of Adminlogin Class
	$al = new Adminlogin();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$adminuser = $_POST['auser'];
		$adminpass = md5($_POST['apass']);
		$cklogin = $al->adminLogin($adminuser,$adminpass);
	}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span style="color:red;font-size:16px">
				<?php
					if (isset($cklogin)) {
						echo $cklogin."<br>";
					}
				?> 
			</span>
			<div>
				<input type="text" placeholder="Username" name="auser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="apass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Electronics Point</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>