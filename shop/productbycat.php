<?php
	include("inc/header.php");
?>
<?php
	if (!isset($_GET['catid']) && $_GET['catid'] == NULL) {
        echo "<script>window.location='404.php';</script>";
    }else{
        $catid = $_GET['catid'];
    }
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Category</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$pdByCat = $pd->getProductByCat($catid);
	      		if ($pdByCat) {
	      			while ($rows = $pdByCat->fetch_assoc()) {
	      				
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pdid=<?php echo $rows['pid'];?>"><img src="admin/<?php echo $rows['image'];?>" alt="" /></a>
					 <h2><?php echo $rows['productName'];?></h2>
					 <p><?php echo $fm->textShorten($rows['body'],60);?></p>
					 <p><span class="price">$ <?php echo $rows['price'];?></span></p>
				     <div class="button"><span><a href="details.php?pdid=<?php echo $rows['pid'];?>" class="details">Details</a></span></div>
				</div>
			<?php
				}
			}else{
				header("Location: 404.php");
			}
			?>

			</div>

	
	
    </div>
 </div>
</div>
 
 <?php
	include("inc/footer.php");
?>
