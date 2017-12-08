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
	color: red
}
</style>

<?php
	$cid = Session::get('csid');
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

        $csUpdate = $csmr->customerProfileUpdate($_POST,$cid);
    }
?>

 <div class="main">
    <div class="content">
		<div class="section group">
	   <?php 
			$csid = Session::get('csid');
			$getCsInfo = $csmr->getCustomerInfo($csid);
			if ($getCsInfo) {
				while ($row = $getCsInfo->fetch_assoc()) {

		?>
		<form action="" method="POST">

			<table class="tblone">
				<tr>
					<td colspan='3'><h2>Update your profile information</h2></td>
					
				</tr>
				<tr>
					<td>Name</td>
					<td>:</td>
					<td><input type="text" name='name' value="<?php echo $row['name'];?>"></td>
				</tr>
				<tr>
					<td>City</td>
					<td>:</td>
					<td><input type="text" name='city' value="<?php echo $row['city'];?>"></td>
				</tr>
				<tr>
					<td>Zip</td>
					<td>:</td>
					<td><input type="text" name='zip' value="<?php echo $row['zip'];?>"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><input type="text" name='address' value="<?php echo $row['address'];?>"></td>
				</tr>
				<tr>
					<td>Country</td>
					<td>:</td>
					<td><input type="text" name='country' value="<?php echo $row['country'];?>"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><input type="text" name='phone' value="<?php echo $row['phone'];?>"></td>
					
				</tr>
				<tr>
					<td colspan='3'><input type="submit" name="update" value="Update Profile"></td>
				</tr>
				<tr>
					<td colspan='3'><h3>
						<?php 
						if (isset($csUpdate)) {
							echo $csUpdate;
						}
						?>
					</h3></td>
				</tr>
			</table>
		</form>
			<?php } }?>

		</div>
       <div class="clear"></div>
    </div>
 </div>
</div>

 <?php
	include("inc/footer.php");
?>
