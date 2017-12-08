<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>

<?php
/**
* Category class
*/
class Category
{
	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insertCat($catname){
		$catname = $this->fm->validation($catname);
		$catname = mysqli_real_escape_string($this->db->link, $catname);

		if (empty($catname)) {
			$msg = "<span class='error'>Category field must not be empty.</span>";
			return $msg;
		}else{
			$sql = "INSERT INTO tbl_category(catName) VALUES('$catname')";
			$inserted = $this->db->insert($sql);
			if ($inserted) {
				$msg = "<span class='success'>Category inserted successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Failed to insert.</span>";
				return $msg;
			}
		}

	}
	//fetch all category list
	public function getAllcat(){
		$sql = "SELECT * FROM tbl_category ORDER BY catId DESC";
		$result = $this->db->select($sql);
		return $result;
	}
	//get Category by ID
	public function getCatbyId($id){
		$sql = "SELECT * FROM tbl_category WHERE catId=$id ";
		$result = $this->db->select($sql);
		return $result;
	}

	//delete category by ID
	public function delCategory($delid){
		$delid = $this->fm->validation($delid);
		$delid = mysqli_real_escape_string($this->db->link, $delid);
		$sql = "DELETE FROM tbl_category WHERE catId='$delid'";
		$result = $this->db->delete($sql);
		if ($result) {
			$msg = "<span class='error'>Successfully Deleted !.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Failed to Delete.</span>";
			return $msg;
		}

	}
	//Update category by ID
	public function updateCat($catname,$catid){
		$catname = $this->fm->validation($catname);
		$catid = $this->fm->validation($catid);
		$catname = mysqli_real_escape_string($this->db->link, $catname);
		$catid = mysqli_real_escape_string($this->db->link, $catid);

		//var_dump($catname, $catid);

		if (empty($catname) || empty($catid)) {
			$msg = "<span class='error'>Category field must not be empty.</span>";
			return $msg;
		}else{
			$sql = "UPDATE tbl_category SET catName = '$catname' WHERE catId='$catid' ";
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