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
.success{
	background: #ddd;
	display: block;
	padding: 50px;
	width: 400px;
	height: 200px;
	margin: 0 auto;
	text-align: center;
}
.success a{
	text-decoration: none;
	color: white;
	background: purple;
	padding: 10px;
}

.success h2{
	color: green;
	margin-top: 10px;
	text-align: center;
}
</style>
 <div class="main">
    <div class="content">
		<div class="section group">
	   		<div class="success">
	   			<h2>Order payment successfull</h2><br>
	   			
	   			 <?php
	   			 	$csid = Session::get('csid');
	   				$amount = $csmr->payableAmount($csid);
	   				if ($amount) {
	   					$sum = 0;
	   					while ($row = $amount->fetch_assoc()) {
	   						$sum = $sum+$row['price'];
	   					}
	   			
	   			?>
	   		<p>Payable amount(Including VAT) :</p>
				<?php
						$vat = $sum*0.1;
	   					$grandTotal = $sum+$vat;
	   					echo $grandTotal;
	   				}
				?>
	   		<br>
	   			<p>Thanks for purches..we will contanct with you with in 72 hours</p><br><br>
	   			<a href="orderdetails.php">Check Order Details</a>
	   		</div>
		</div>
       <div class="clear"></div>
    </div>
 </div>
</div>

<?php
	include("inc/footer.php");
?>
