	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<!-- Iphone -->
				<?php 
					$getIphone = $pd->getLatestIphone();
					if ($getIphone) {
						while ($row = $getIphone->fetch_assoc()) {

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pdid=<?php echo $row['pid'];?>"> <img src="admin/<?php echo $row['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $row['body'];?></p>
						<div class="button"><span><a href="details.php?pdid=<?php echo $row['pid'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php							
						}
					}

			   ?>	

			   	<!-- Samsung -->
				<?php 
					$getSamsung = $pd->getLatestSamsung();
					if ($getSamsung) {
						while ($row = $getSamsung->fetch_assoc()) {

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pdid=<?php echo $row['pid'];?>"> <img src="admin/<?php echo $row['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Samsung</h2>
						<p><?php echo $row['body'];?></p>
						<div class="button"><span><a href="details.php?pdid=<?php echo $row['pid'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php							
						}
					}

			   ?>	

			</div>

			<div class="section group">
				<!-- Acer -->
				<?php 
					$getAcer = $pd->getLatestAcer();
					if ($getAcer) {
						while ($row = $getAcer->fetch_assoc()) {

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pdid=<?php echo $row['pid'];?>"> <img src="admin/<?php echo $row['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $row['body'];?></p>
						<div class="button"><span><a href="details.php?pdid=<?php echo $row['pid'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php							
						}
					}

			   ?>	
			   		<!-- Canon -->
			   		
				<?php 
					$getCanon = $pd->getLatestCanon();
					if ($getCanon) {
						while ($row = $getCanon->fetch_assoc()) {

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pdid=<?php echo $row['pid'];?>"> <img src="admin/<?php echo $row['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Canon</h2>
						<p><?php echo $row['body'];?></p>
						<div class="button"><span><a href="details.php?pdid=<?php echo $row['pid'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php							
						}
					}

			   ?>	
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/5.jpg" alt=""/></li>
						<!-- <li><img src="images/4.jpg" alt=""/></li> -->
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	