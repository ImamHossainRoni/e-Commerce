<?php
	include("inc/header.php");
?>
<?php
	$login = Session::get('cslogin');
	if ($login == false) {
		header("Location: login.php");
	}
?>
<?php
		if (isset($_GET['csconfirm'])) {
		$id = $_GET['csconfirm'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$csConfirm = $csmr->confirmByCustomer($id, $price, $time);
	}
?>
 <div class="main">
    <div class="content">
		<div class="section group">
	   			<h2>Your Order Details</h2><br>
	   			<?php
	   				if (isset($csConfirm)) {
	   					echo $csConfirm."<br><br>";
	   				}
	   			?>
	   				<table class="tblone">
							<tr>
								<th>No</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
					    <?php
					    	$csid = Session::get('csid');
							$getOrderProd = $csmr->getOrderProduct($csid);
							if ($getOrderProd) {
								$sum = 0;
								$qty = 0;
								$i = 1;
								while ($orderpd = $getOrderProd->fetch_assoc()) {
					   	?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $orderpd['productName'];?></td>
								<td><img src="admin/<?php echo $orderpd['image'];?>"/></td>
								<td><?php echo $orderpd['quantity'];?></td>
								<td>$ <?php echo $orderpd['price'];?></td>
								<td><?php echo $fm->formatDate($orderpd['Date']);?></td>
								<td><?php if($orderpd['status'] == 0){
									echo "Pendding";
								}elseif($orderpd['status'] == 1){
									echo "Shifted";
								}else{
									echo "Confirmed";
								}?></td>
							<td>
								<?php
									if ($orderpd['status'] == 1) { ?>
									<a href="?csconfirm=<?php echo $csid; ?>&price=<?php echo $orderpd['price'];?>&time=<?php echo $orderpd['Date'];?>">Confirm Order</a>
								<?php }else{
									echo "N/A";
								}
								 ?>

							</td>
							</tr>

						<?php $i++; } } ?>

						</table>
		</div>
       <div class="clear"></div>
    </div>
 </div>
</div>

 <?php
	include("inc/footer.php");
?>