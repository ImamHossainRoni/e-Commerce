<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/Session.php");
//check session
Session::checkLogin();

include_once ($filepath."/../libs/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>

<?php
/**
* Admin Login class
*/
class Adminlogin
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	//admin login 
	public function adminLogin($aname, $apass){
		$uname = $this->fm->validation($aname);
		$pass = $this->fm->validation($apass);

		$uname = mysqli_real_escape_string($this->db->link, $uname);
	    $pass = mysqli_real_escape_string($this->db->link, $pass);

		if (empty($uname) || empty($pass)) {
			$lgmsg = "Username or Password must not be empty !";
			return $lgmsg;
		}else{
			$sql = "SELECT * FROM tbl_admin WHERE ad_user='{$uname}' AND ad_pass='{$pass}'";
			$result = $this->db->select($sql);
			
			if($result){
				
			 	$value = $result->fetch_assoc();
			 	var_dump($value);
			 	 Session::set("adminlogin",true);
			 	 Session::set("adminId",$value['id']);
			 	 Session::set("adminUser",$value['ad_user']);
			 	 Session::set("adminName",$value['name']);
			 	 header("Location: index.php");
			 	
			 }else{
			 	$lgmsg = "Username or Password not Match!";
			 	return $lgmsg;
			 }
		}
	}


//end of admin login class
}

?>