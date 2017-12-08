<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include "../classes/Category.php";
include "../classes/Brand.php";
include "../classes/Product.php";

?>
<?php
	if (!isset($_GET['prodid']) && $_GET['prodid'] == NULL) {
        echo "<script>window.location='productlist.php';</script>";
    }else{
        $pdid = $_GET['prodid'];
    }

    //Insert product details
    $pd = new Product();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pdUpdated = $pd->updateProduct($_POST, $_FILES, $pdid);
    }
    
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">           
        <?php
            if (isset($pdUpdated)) {
                echo $pdUpdated;
            }
        ?>    
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <?php
               		$pdinfo = $pd->getProdById($pdid);
               		if ($pdinfo) {
               			while ($pdresult = $pdinfo->fetch_assoc()) {
               ?>
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text"  name="pname" value="<?php echo $pdresult['productName']; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="pcategory">
                            <option>Select Category</option>
                            <?php
                                //get all category
                                $cat = new Category();
                                $allcat = $cat-> getAllcat();
                                if ($allcat) {
                                    while ($row = $allcat->fetch_assoc()) {
                        
                                ?>
                                 <option
								 <?php
                                 if ($pdresult['catId'] == $row['catId']) { ?>
									selected = "selected"
                                 <?php } ?>
								value="<?php echo $row['catId'];?>" ><?php echo $row['catName'];?>
                            	 </option>

                            <?php
                                     }
                                }else{
                                    echo "No category found.";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="pbrand">
                            <option>Select Brand</option>
                             <?php
                                //get all category
                                $brand = new Brand();
                                $allBrand= $brand-> getAllbrand();
                                if ($allBrand) {
                                    while ($row = $allBrand->fetch_assoc()) {
                        
                                ?>
                                  <option
								 <?php
                                 if ($pdresult['brandId'] == $row['brandId']) { ?>
									selected = "selected"
                                 <?php } ?>
								value="<?php echo $row['brandId'];?>" ><?php echo $row['brandName'];?>
                            	 </option>


                            <?php
                                     }
                                }else{
                                    echo "No Brand found.";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="pdescription"><?php echo $pdresult['body']; ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="p_price" value="<?php echo $pdresult['price']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    	<img width="100px" height="80px;" src="<?php echo $pdresult['image']; ?>" alt="">
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="ptype">
                            <option>Select Type</option>
                            <?php
                        	if ($pdresult['type'] == 1) { ?>
                        		<option value="1" selected="selected">Featured</option>
                       		    <option value="2">General</option>
                        	<?php }else{ ?>
								<option value="1">Featured</option>
                            	<option value="2" selected="selected">General</option>

                            <?php } ?>
                            
                        </select>
                    </td>
                </tr>

                <?php
                		}
               		}
               		
                ?>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="update Product" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>