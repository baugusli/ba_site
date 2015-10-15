<?php
	//include pls
	class Captain{
		private $accountId;
		private $username;
		private $password;
		private $firstName;
		private $lastName;
		
	
		public function __construct(){
		}
		
		public function getAccountId(){
			return $this->accountId;
		}
		
		public function setAccountId($accountId){
			$this->accountId = $accountId;
		}
		
		public function getUsername(){
			return $this->username;
		}
		
		public function setUsername($username){
			$this->username = $username;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}
		
		public function getFirstName(){
			return $this->firstName;
		}
		
		public function setFirstName($firstName){
			$this->firstName = $firstName;
		}
		public function getLastName(){
			return $this->lastName;
		}
		
		public function setLastName($lastName){
			$this->lastName = $lastName;
		}
		
		public function getDateTimeCreated(){
			return $this->dateTimeCreated;
		}
		
		public function getAccountStatus(){
			return $this->accountStatus;
		}
		
		public function getMobileNumber(){
			return $this->mobileNumber;
		}
		
		public function setMobileNumber($mobileNumber){
			$this->mobileNumber = $mobileNumber;
		}
		
		public function getDob(){
			return $this->dob;
		}
		
		public function setDob($dob){
			$this->dob = $dob;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		
		public function getVerificationCode(){
			return $this->verificationCode;
		}
		
		public function setVerificationCode($verificationCode){
			$this->verificationCode = $verificationCode;
		}
		
		//TRY EXTENDING THE CLASS TO DB
		public function registerCaptain($username, $password, $firstName, $lastName){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "INSERT INTO `captain`(`username`, `password`, `firstName`, `lastName`) VALUES ('$username', '$password', '$firstName', '$lastName');";
			if(!$mysqli->query($query)){
				$mysqli->close();
				die('ERROR!');
			}
			else{
				
				return true;
			}
			
			return false;
		}
		
		
		public function createAccount($username, $password, $firstName, $lastName, $mobileNumber, $dob,$email,$verificationCode){
			
			$mysql = new MySQLi('50.62.209.79', 'poliang', 'digital13', 'sso');
			$set_table = "Account";			
			$set_select_sql = "INSERT INTO `$set_table`(`username`, `password`, `firstName`, `lastName`, `dataTimeCreated`, `accountStatus`, `mobileNumber`, `dob`,`email`, `verificationCode`) VALUES ('$username', sha1('$password'), '$firstName', '$lastName', now(), 'Pending', $mobileNumber, '$dob','$email','$verificationCode');";
			if(!$mysql->query($set_select_sql)){
				$mysql->close();
				die('ERROR!');
			}
			else{
				$mysql->close();
				return true;
			}
			$mysql->close();
			return false;
		}
		//login header db test
		public function retrieveAccountId($username){
			$mysql = new MySQLi('50.62.209.79', 'poliang', 'digital13', 'sso');
			$result = $mysql->query("SELECT * FROM Account WHERE username='$username'");
			
			$accountId = "";
			
			while($news_row = $result->fetch_array()) {
				$accountId = $news_row['accountId'];
			}
			$result->close();
			$mysql->close();
			return $accountId;
		}
		
		//login header DB test
		public function verifyAccount($verificationCode){
			$mysql = new MySQLi('50.62.209.79', 'poliang', 'digital13', 'sso');
			$result = $mysql->query("SELECT * FROM Account WHERE verificationCode='$verificationCode'");
			
			$accountId = 0;
			
			while($news_row = $result->fetch_array()) {
				$accountId = $news_row['accountId'];
			}
			$result->close();
			$mysql->close();
			return $accountId;
		}
		
		//LOGIN HEADER DB TEST
		public function retrieveAccount($accountId){
			$mysql = new MySQLi('50.62.209.79', 'poliang', 'digital13', 'sso');
			$result = $mysql->query("SELECT * FROM Account WHERE accountId=$accountId");
			
			while($news_row = $result->fetch_array()) {
				$this->accountId = $news_row['accountId'];
				$this->username = $news_row['username'];
				$this->password = $news_row['password'];
				$this->firstName = $news_row['firstName'];
				$this->lastName = $news_row['lastName'];
				$this->dateTimeCreated = $news_row['dateTimeCreated'];
				$this->accountStatus = $news_row['accountStatus'];
				$this->mobileNumber = $news_row['mobileNumber'];
				$this->dob = $news_row['dob'];
				$this->email = $news_row['email'];
				$this->verificationCode = $news_row['verificationCode'];
			}
			$result->close();
			$mysql->close();
		}
		
		public function retrieveAccountByEmail($email){
			$mysql = new MySQLi('localhost', 'snapblop_admin', 'asd123', 'snapblop_sso');
			$result = $mysql->query("SELECT * FROM Account WHERE email='$email'");
			
			while($news_row = $result->fetch_array()) {
				$this->accountId = $news_row['accountId'];
				$this->username = $news_row['username'];
				$this->password = $news_row['password'];
				$this->firstName = $news_row['firstName'];
				$this->lastName = $news_row['lastName'];
				$this->dateTimeCreated = $news_row['dateTimeCreated'];
				$this->accountStatus = $news_row['accountStatus'];
				$this->mobileNumber = $news_row['mobileNumber'];
				$this->dob = $news_row['dob'];
				$this->email = $news_row['email'];
				$this->verificationCode = $news_row['verificationCode'];
			}
			$result->close();
			$mysql->close();
		}
		
		//HEADER DB TEST
		public function authenticate($username, $password){
			$mysql = new MySQLi('50.62.209.79', 'poliang', 'digital13', 'sso');
			$result = $mysql->query("SELECT * FROM `Account` WHERE username = '$username' AND password = sha1('$password')");
						
			while($news_row = $result->fetch_array()) {
				$this->accountId = $news_row['accountId'];
				$this->username = $news_row['username'];
				$this->password = $news_row['password'];
				$this->firstName = $news_row['firstName'];
				$this->lastName = $news_row['lastName'];
				$this->dateTimeCreated = $news_row['dateTimeCreated'];
				$this->accountStatus = $news_row['accountStatus'];
				$this->mobileNumber = $news_row['mobileNumber'];
				$this->dob = $news_row['dob'];
				$this->email = $news_row['email'];
				$this->verificationCode = $news_row['verificationCode'];
			}
			$result->close();
			$mysql->close();
		}		
		
		public function updateAccount($accountId, $firstName, $lastName, $mobileNumber, $dob,$email){
			
			$mysql = new MySQLi('localhost', 'snapblop_admin', 'asd123', 'snapblop_sso');			
			$set_select_sql = "UPDATE `Account` SET `firstName`='$firstName',`lastName`='$lastName',`mobileNumber`=$mobileNumber,`dob`='$dob',`email`='$email' WHERE `accountId`= $accountId";
			if(!$mysql->query($set_select_sql)){
				$mysql->close();
				die('ERROR!');
			}
			else{
				$mysql->close();
				return true;
			}
			$mysql->close();
			return false;
		}
		
		//login db test
		public function updateAccountStatus($accountId, $accountStatus){
			
			$mysql = new MySQLi('50.62.209.79', 'poliang', 'digital13', 'sso');		
			$set_select_sql = "UPDATE `Account` SET accountStatus='$accountStatus' WHERE `accountId`= $accountId";
			if(!$mysql->query($set_select_sql)){
				$mysql->close();
				die('ERROR!');
			}
			else{
				$mysql->close();
				return true;
			}
			$mysql->close();
			return false;
		}
		
		public function retrieveAllAccount(){
		
			$mysql = new MySQLi('localhost', 'snapblop_admin', 'asd123', 'snapblop_sso');
			$result = $mysql->query("SELECT * FROM Account");
			
			$list = array();
			$counter = 0;
			while($news_row = $result->fetch_array()) {
			$account = new Account();
			
				$account ->setAccountId($news_row['accountId']);
				$account ->setUserName($news_row['username']);
				$account ->setFirstName($news_row['firstName']);
				$account ->setLastName($news_row['lastName']);
				$account ->setEmail($news_row['email']);
				$list[$counter] = $account;
				$counter++;
			}
			$result->close();
			$mysql->close();
			return $list;
			
			
		}
		
		public function retrieveAccountByDetail($detail, $accountId){
		
			$mysql = new MySQLi('localhost', 'snapblop_admin', 'asd123', 'snapblop_sso');
			$result = $mysql->query("SELECT $detail FROM Account WHERE accountId=$accountId");
			
			$news_row = $result->fetch_array();
			$result->close();
			$mysql->close();
			return $news_row;
		}
		
	}

?>