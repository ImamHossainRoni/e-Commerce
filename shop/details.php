<?php
	include("inc/header.php");
?>
<?php
	if (isset($_GET['pdid'])) {
        $pdid = $_GET['pdid'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quant = $_POST['quantity'];
        if ($quant>0) {
        	$addcart = $ct->addToCart($quant, $pdid);
        }
        
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
        $csid = Session::get('csid');
        $prodId = $_POST['prodId'];
        $insertCom = $pd->insertCompare($csid,$prodId);
    }

     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
        $csid = Session::get('csid');
        $insertCom = $pd->saveToWishlist($csid,$pdid);
    }

?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<?php 
					$singlePd = $pd->getSingleProduct($pdid);
					if ($singlePd) {
						while ($row = $singlePd->fetch_assoc()) {
							
				?>
			<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $row['image'];?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $row['productName'];?></h2>
					<p><?php echo $fm->textShorten($row['body'],100);?></p>					
					<div class="price">
						<p>Price: <span>$<?php echo $row['price'];?></span></p>
						<p>Category: <span><?php echo $row['catName'];?></span></p>
						<p>Brand:<span><?php echo $row['brandName'];?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form><br>
						<span style="color:red"><?php 
							if (isset($addcart)) {
								echo $addcart;
							}
						?>	
						</span>		
					</div>
						<?php 
							if (isset($insertCom)) {
								echo $insertCom;
							}
						?>	
					<?php 
						if (Session::get('cslogin') == true) {
					?>
					<div class="add-cart">
						<form action="" method="post">
							<input type="hidden" name="prodId" value="<?php echo $row['pid']; ?>"/>
							<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
						</form><br>	
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="submit" class="buysubmit" name="wishlist" value="Save To wishlist"/>
						</form><br>	
					</div>
					<?php } ?>
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo $row['body'];?></p>
			        
		    	</div>
				
			</div>

			<?php
					}
				}
			?>

				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php 
							$allCat = $cat->getAllcat();
							if ($allCat) {
								while ($rows = $allCat->fetch_assoc()) {
						?>
						<li><a href="productbycat.php?catid=<?php echo $rows['catId'];?>"><?php echo $rows['catName'];?></a></li>
									
						<?php		
								}
							}
						?>

    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>

<?php
	include("inc/footer.php");
?>
