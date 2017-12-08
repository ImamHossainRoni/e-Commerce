<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include "../classes/Brand.php";
?>
<?php
    $brand = new Brand();

    $allBrand = $brand->getAllbrand();

    //delete Brand
    if (isset($_GET['delid']) && $_GET['delid'] != NULL) {
    	$delid = $_GET['delid'];
    	$delbrand = $brand->delBrand($delid);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <?php
                	if (isset($delbrand)) {
                		echo $delbrand;
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if ($allBrand) {
								$i = 1;
								while ($row = $allBrand->fetch_assoc()) {
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['brandName']; ?></td>
							<td><a href="brandedit.php?bid=<?php echo $row['brandId'] ?>">Edit</a> || <a href="?delid=<?php echo $row['brandId'] ?>" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
						</tr>
						
						<?php
							$i++;
							}
							}else{
								echo "Brand Not Found!";
							}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

