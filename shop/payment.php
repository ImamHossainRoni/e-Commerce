<?php
	include("inc/header.php");
?>
<?php
	$login = Session::get('cslogin');
	if ($login == false) {
		header("Location: login.php");
	}
?>
<style>
.errpage{
	text-align: center;
	font-size: 100px;
	color: red;
}
.payment{
	background: #ddd;
	display: block;
	padding: 50px;
	width: 400px;
	height: 200px;
	margin: 0 auto;
	text-align: center;
}
.payment a{
	text-decoration: none;
	color: white;
	background: purple;
	padding: 10px;
}
.payment h3{
	margin-top: 10px;
	text-align: center;
}
</style>
 <div class="main">
    <div class="content">
		<div class="section group">
	   		<div class="payment">
	   			<h2>Choose a payment method</h2><br>
	   			<a href="payoffline.php">Offline Payment</a>
	   			<a href="bank.php">Online Payment</a><br><br><br>
	   			<h3><a href="cart.php">Previous</a></h3>
	   		</div>
		</div>
       <div class="clear"></div>
    </div>
 </div>
</div>

 <?php
	include("inc/footer.php");
?>
