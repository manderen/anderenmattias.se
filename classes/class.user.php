<?php

include('class.password.php');

//class user duty: logg on/off user verifying pass and make hash of pass
class User extends Password{

    private $db;
	// Execute  this function, then parent constructor
	function __construct($db){
		parent::__construct();
	
		$this->_db = $db; //Variable assigned to all methods.
	}
	//Check if user has accessed session
	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}
	// Function to get hashed pass from warehouse
	private function get_user_hash($username){	

		try {

			$stmt = $this->_db->prepare('SELECT password FROM member WHERE username = :username');
			$stmt->execute(array('username' => $username));
			//assign pass to row from warehouse
			$row = $stmt->fetch();
			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	//with argument password, hashed compere to 1 access admitted
	public function login($username,$password){	

		$hashed = $this->get_user_hash($username);
		
		if($this->password_verify($password,$hashed) == 1){
		    
		    $_SESSION['loggedin'] = true;
		    return true;
		}		
	}
	
	//end session	
	public function logout(){
		session_destroy();
	}
	
}


?>