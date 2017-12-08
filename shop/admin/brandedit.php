<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include "../classes/Brand.php";
?>
<?php
    if (!isset($_GET['bid']) && $_GET['bid'] == NULL) {
        echo "<script>window.location='brand_list.php';</script>";
    }else{
        $bid = $_GET['bid'];
    }
    //creating object of Brand class
    $cat = new Brand();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandname = $_POST['brandName'];
        $updateBrand = $cat->updateBrand($brandname,$bid);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
               <div class="block copyblock"> 
                    <?php
                        if (isset($updateBrand)) {
                            echo "$updateBrand";
                        }
                    ?>
                 <form action="" method="post">
                    <table class="form">
                    <?php
                        $singleBrand = $cat->getBrandbyId($bid);
                        if ($singleBrand) {
                            while($row = $singleBrand->fetch_assoc()){
                    ?>					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Brand Name." name="brandName" value="<?php echo $row['brandName']; ?>" class="medium" />
                            </td>
                        </tr>

                    <?php  } } ?>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="update Brand" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>