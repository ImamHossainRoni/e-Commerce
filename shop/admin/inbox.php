<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath."/../classes/Customer.php");
?>
<?php
	$csmr = new Customer();
	$fm   = new Format();
	
	if (isset($_GET['shiftid'])) {
		$id = $_GET['shiftid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$shifted = $csmr->shiftedOrder($id, $price, $time);
	}
	if (isset($_GET['confirmedid'])) {
		$id = $_GET['confirmedid'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$delConfirm = $csmr->deleteConfirmOrder($id, $price, $time);
	}
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php if (isset($shifted)) {
                	echo $shifted;
                }?>
                <?php if (isset($delConfirm)) {
                	echo $delConfirm;
                }?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>OrderId</th>
							<th>Order Time</th>
							<th>CsId</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						
						$getAllorder = $csmr->getAllorder();
						if ($getAllorder) {
							while ($rows = $getAllorder->fetch_assoc()) {
						?>

					<tr class="odd gradeX">
					<td><?php echo $rows['id'];?></td>
					<td><?php echo $fm->formatDate($rows['Date']);?></td>
					<td><?php echo $rows['csId'];?></td>
					<td><?php echo $rows['productName'];?></td>
					<td><?php echo $rows['quantity'];?></td>
					<td>$ <?php echo $rows['price'];?></td>
					<td><a href="customer.php?csid=<?php echo $rows['csId'];?>">View Details</a></td>
						<?php 
							if ($rows['status'] == 0) {
						?>
								<td><a href="?shiftid=<?php echo $rows['csId'];?>&price=<?php echo $rows['price'];?>&time=<?php echo $rows['Date'];?>">Shift</a></td> 

						<?php	}elseif($rows['status']==1){  ?>
								<td>Pending</td> 
						<?php }else{ ?>

						<td><a href="?confirmedid=<?php echo $rows['csId'];?>&price=<?php echo $rows['price'];?>&time=<?php echo $rows['Date'];?>">Remove</a></td> 
						<?php  } ?>
				   </tr>

					<?php
						}
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
