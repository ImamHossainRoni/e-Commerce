<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include "../classes/Category.php";
?>
<?php
    $cat = new Category();

    $allCat = $cat->getAllcat();

    //delete category
    if (isset($_GET['delid']) && $_GET['delid'] != NULL) {
    	$delid = $_GET['delid'];
    	$delCat = $cat->delCategory($delid);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                	if (isset($delCat)) {
                		echo $delCat;
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if ($allCat) {
								$i = 1;
								while ($row = $allCat->fetch_assoc()) {
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['catName']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $row['catId'] ?>">Edit</a> || <a href="?delid=<?php echo $row['catId'] ?>" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
						</tr>
						<?php
								$i++;
								}
							}else{
								echo "Category Not Found!";
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

