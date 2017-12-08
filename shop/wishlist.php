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
	if (isset($_GET['wlistid'])) {
		$csid = Session::get('csid');
		$pdid = $_GET['wlistid'];
		$delwlist = $pd->delCustomerwishlist($csid, $pdid);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width:100%;text-align:center">Wishlist Product</h2>
			    	<?php
			    		if (isset($delwlist)) {
			    			echo $delwlist;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Image</th>
								<th>View</th>
								<th>Action</th>
							</tr>
					    <?php
					    	$csid = Session::get('csid');
							$getProd = $pd->checkWishlistData($csid);
							if ($getProd) {
								$i = 1;
								while ($cartpd = $getProd->fetch_assoc()) {
					   	?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $cartpd['productName'];?></td>
								<td>$ <?php echo $cartpd['price'];?></td>
								<td><img src="admin/<?php echo $cartpd['image'];?>" alt=""/></td>
								<td><a href="details.php?pdid=<?php echo $cartpd['productId'];?>">View</a></td>
								<td>
									<a href="details.php?pdid=<?php echo $cartpd['productId'];?>">Buy Now</a> || <a href="?wlistid=<?php echo $cartpd['productId'];?>">Remove</a>	
								</td>
							</tr>

						<?php $i++; } } ?>

						</table>
						
					</div>
					<div class="shopping" style="width:600px;margin:0 auto;">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>

 <?php
	include("inc/footer.php");
?>
