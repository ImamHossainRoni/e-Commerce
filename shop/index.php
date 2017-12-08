<?php
	include("inc/header.php");
	include("inc/slider.php");
?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      		$getFeaturedPd = $pd->getFeaturedProduct();
	      		if ($getFeaturedPd) {
	      			while ($fpd = $getFeaturedPd->fetch_assoc()) {
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pdid=<?php echo $fpd['pid'];?>"><img src="admin/<?php echo $fpd['image']; ?>" alt="" /></a>
					 <h2><?php echo $fpd['productName'];?></h2>
					 <p><?php echo $fm->textShorten($fpd['body'], 50);?></p>
					 <p><span class="price">$ <?php echo $fpd['price'];?></span></p>
				     <div class="button"><span><a href="details.php?pdid=<?php echo $fpd['pid'];?>" class="details">Details</a></span></div>
				</div>
			<?php
					}
	      		}else{
	      			echo "<span class='error'>No product found.</span>";
	      		}
			?>

			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
      		$getNewPd = $pd->getNewProduct();
      		if ($getNewPd) {
      			while ($newpd = $getNewPd->fetch_assoc()) {
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pdid=<?php echo $newpd['pid'];?>"><img src="admin/<?php echo $newpd['image']; ?>" alt="" /></a>
					 <h2><?php echo $newpd['productName'];?></h2>
					 <p><?php echo $fm->textShorten($newpd['body'], 50);?></p>
					 <p><span class="price">$ <?php echo $newpd['price'];?></span></p>
				     <div class="button"><span><a href="details.php?pdid=<?php echo $newpd['pid'];?>" class="details">Details</a></span></div>
				</div>
			<?php
					}
	      		}else{
	      			echo "<span class='error'>No product found.</span>";
	      		}
			?>
				
			</div>
    </div>
 </div>

<?php
	include("inc/footer.php");
?>