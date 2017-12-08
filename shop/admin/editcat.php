<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
include "../classes/Category.php";
?>
<?php
    if (!isset($_GET['catid']) && $_GET['catid'] == NULL) {
        echo "<script>window.location='catlist.php';</script>";
    }else{
        $catid = $_GET['catid'];
    }
    //creating object of Category class
    $cat = new Category();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catname = $_POST['catName'];
        $updateCat = $cat->updateCat($catname,$catid);
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                    <?php
                        if (isset($updateCat)) {
                            echo "$updateCat";
                        }
                    ?>
                 <form action="" method="post">
                    <table class="form">
                    <?php
                        $singleCat = $cat->getCatbyId($catid);
                        if ($singleCat) {
                            while($row = $singleCat->fetch_assoc()){
                    ?>					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name." name="catName" value="<?php echo $row['catName']; ?>" class="medium" />
                            </td>
                        </tr>

                    <?php  } } ?>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>