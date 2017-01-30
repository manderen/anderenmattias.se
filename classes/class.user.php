<?php

include('class.password.php');

//class user duty: logg on/off user verifying pass and make hash of pass
class User extends Password{

    private $db;
	

	function __construct($db){
		parent::__construct();
	
		$this->_db = $db; //Variable assigned to all methods.
	}	// Execute  this function, then parent constructor
	

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}	//Check if user has access session	
	}
	

	private function get_user_hash($username){	
		try {

			$stmt = $this->_db->prepare('SELECT password FROM member WHERE username = :username');
			$stmt->execute(array('username' => $username));
			$row = $stmt->fetch();		//assign pass to row from warehouse
			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		} // Function to get hashed pass from warehouse
	}

	
	public function login($username,$password){	

		$hashed = $this->get_user_hash($username);
		
		if($this->password_verify($password,$hashed) == 1){
		    
		    $_SESSION['loggedin'] = true;
		    return true;
		}	//with argument password, hashed compere to 1 access admitted		
	}
	
	
	public function logout(){
		session_destroy();
	}	//end session	
	
}


?>