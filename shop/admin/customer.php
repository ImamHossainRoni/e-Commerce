<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../classes/Customer.php");
?>
<?php
    if (!isset($_GET['csid']) && $_GET['csid'] == NULL) {
        echo "<script>window.location='inbox.php';</script>";
    }else{
        $csid = $_GET['csid'];
    }
    //creating object of Category class
    $csmr = new Customer();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
                    <?php
                        if (isset($updateCat)) {
                            echo "$updateCat";
                        }
                    ?>
                 <form action="" method="post">
                    <table class="form">
                    <?php
                        $singleCustomer = $csmr->getCustomerInfo($csid);
                        if ($singleCustomer) {
                            while($row = $singleCustomer->fetch_assoc()){
                    ?>					
                        <tr>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $row['name']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $row['city']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $row['zip']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $row['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $row['address']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $row['country']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly="readonly" name="catName" value="<?php echo $row['phone']; ?>" class="medium" />
                            </td>
                        </tr>

                    <?php  } } ?>
						<tr> 
                            <td>
                              <button>  <a href="inbox.php">Back to inbox</a> </button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>