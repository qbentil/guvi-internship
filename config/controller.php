<?php
class Controller
{
	private $con;
    private $tb; //Database table to get data from
    function __construct()
    {
        include_once("dbconfig.php");
        $db = new Database();
        $this->con = $db->connect();
		$this->set("tb", "users");
    }
    // setter
    protected function set($property, $value)
    {
        $this->$property = $value;
    }
    // getter
    protected function get($name)
    {
       return $this->$name;
    }
	protected function exists($username)
	{
        $tb = $this->get('tb');
		$pre_stmt = $this->con->prepare("SELECT * FROM `$tb` WHERE username = ? LIMIT 1");
		$pre_stmt->bind_param("s",$username);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows > 0)
		{
			return true; 
		}else
		{
			return false;
		}
	}

	public function new($username, $password)
	{
		if(!$this->exists($username))
		{
            $tb = $this->get("tb");
			$stmt = "INSERT INTO `$tb`(`username`, `password`, `register_date`) VALUES (?,?,?)";
			$pre_stmt = $this->con->prepare($stmt);
			$date = date("y-m-d h:i:s");
            $password = sha1($password);  
			$pre_stmt->bind_param("sss", $username, $password, $date);
			$result = $pre_stmt->execute() or die($this->con->error);
			return $result? "SUCCESS":"FAILED";
		}
		return "EXISTS";
	}
	public function updateBasicInfo($id,$fname,$lname, $phone, $email, $location)
	{
        $tb = $this->get("tb");
		$stmt = "UPDATE `$tb` SET `first_name`=?, `last_name` = ?,`phone`=?, `email`=?, `location`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("sssssi", $fname,$lname, $phone, $email, $location, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "SUCCESS":"FAILED";
	}

	
	public function changeImage($id, $photo)
	{
		$tb = $this->get('tb');
		$stmt = "UPDATE `$tb` SET `image`=? WHERE `id`=?";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("si", $photo, $id);
		$result = $pre_stmt->execute() or die($this->con->error);
		return $result? "SUCCESS":"FAILED";
	}
    
	private function currentPassword($id)
	{
		return $this->singlerecord($id)['password'];	
	}

	public function changePassword($id, $current_password, $new_password)
	{
		if(sha1($current_password) == $this->currentPassword($id)) //Check if current password is correct
		{
			$tb = $this->get('tb');
			$stmt = "UPDATE `$tb` SET `password`=? WHERE `id`=?";
			$pre_stmt = $this->con->prepare($stmt);
            $new_password = sha1($new_password); 
			$pre_stmt->bind_param("si", $new_password, $id);
			$result = $pre_stmt->execute() or die($this->con->error);
            return $result? "SUCCESS":"FAILED";
		}
		return "INCORRECT";
	}


	public function records($rule=NULL) // get all records in a table
	{
		$tb =$this->tb;
		$stmt = "SELECT * FROM `$tb` $rule";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
	}

	public function singlerecord($id)
	{
        $tb = $this->tb;
		$stmt = "SELECT * FROM  `$tb` WHERE id = ? LIMIT 1";
		$pre_stmt = $this->con->prepare($stmt);
		$pre_stmt->bind_param("i", $id);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		return $result->fetch_assoc();
	}

	public function login($umail,$upass)   {
        try {
            $tb = $this->tb;
            $stmt = "SELECT * FROM `{$tb}` WHERE username=?";
            $pre_stmt = $this->con->prepare($stmt);
            $pre_stmt->bind_param("s",$umail);
            $pre_stmt->execute() or die($this->con->error);
            $result = $pre_stmt->get_result();
            if ($result->num_rows == 1) {
                $result = $result->fetch_assoc();
                if(sha1($upass) == $result['password']) {
                    $_SESSION['user_id'] = $result['id'];
                    return true;
                } else {
                    return false;
                }
            }
        }
        catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function is_loggedin() {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
		return false;
    }

    public function redirect($url) {
        header("Location: $url");
        exit();
    }

    public function logout() {
        unset($_SESSION['user_id']);
        return true;
    }



}

// $pr = new Controller();
// echo "<pre>";
// $username = "qbentil";
// $password = "admin123";


// echo $pr->new($username, $password);
// echo $pr->changeImage(1, "myphoto.jpg");
// echo $pr->updateBasicInfo(1, $name, $phone);
// echo $pr->updateSocials(1, "https:www.facebook.com/", "https:www.telegram.com/", "https:www.twitter.com/");
// echo $pr->changeImage(1, "photo", "users.png");
// echo print_r($pr->records());
// echo "<h1 align='center'>Controller Class..............</h1>";