<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>

<?php
/**
* Brand class
*/
class Brand
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insertBrand($brandname){
		$brandname = $this->fm->validation($brandname);
		$brandname = mysqli_real_escape_string($this->db->link, $brandname);

		if (empty($brandname)) {
			$msg = "<span class='error'>Brand Name field must not be empty.</span>";
			return $msg;
		}else{
			$sql = "INSERT INTO tbl_brand(brandName) VALUES('$brandname')";
			$inserted = $this->db->insert($sql);
			if ($inserted) {
				$msg = "<span class='success'>Brand inserted successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Failed to insert.</span>";
				return $msg;
			}
		}

	}
	//fetch all Brand list
	public function getAllbrand(){
		$sql = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($sql);
		return $result;
	}
	//get Brand by ID
	public function getBrandbyId($id){
		$sql = "SELECT * FROM tbl_brand WHERE brandId=$id ";
		$result = $this->db->select($sql);
		return $result;
	}

	//delete Brand by ID
	public function delBrand($delid){
		$delid = $this->fm->validation($delid);
		$delid = mysqli_real_escape_string($this->db->link, $delid);
		$sql = "DELETE FROM tbl_brand WHERE brandId='$delid'";
		$result = $this->db->delete($sql);
		if ($result) {
			$msg = "<span class='error'>Successfully Deleted !.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Failed to Delete.</span>";
			return $msg;
		}

	}
	//Update Brand by ID
	public function updateBrand($brandname,$brandid){
		$brandname = $this->fm->validation($brandname);
		$brandid = $this->fm->validation($brandid);
		$brandname = mysqli_real_escape_string($this->db->link, $brandname);
		$brandid = mysqli_real_escape_string($this->db->link, $brandid);

		//var_dump($brandname, $brandid);

		if (empty($brandname) || empty($brandid)) {
			$msg = "<span class='error'>Brand field must not be empty.</span>";
			return $msg;
		}else{
			$sql = "UPDATE tbl_brand SET brandName = '$brandname' WHERE brandId='$brandid' ";
			$result = $this->db->update($sql);
			if ($result) {
				$msg = "<span class='success'>Successfully Updated !.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Filed to Update !.</span>";
				return $msg;
			}
		}
		
	}

}

?>