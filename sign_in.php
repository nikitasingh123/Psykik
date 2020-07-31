<?PHP	
	session_start();
	
	?>
<?php
	$dbhost="localhost";
	$dbname="project";
	$dbuser="root";
	$dbpass="AKainth";
	
	$connect= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	if(mysqli_connect_errno()) {
		die("Database connection failed: ". mysqli_connect_error()."(".mysqli_connect_errno().")");
	}
	error_reporting(0);
	?>
	
<?php 
	function find_account_by_username($username) {
		global $connect;
		$safe_username=mysqli_real_escape_string($connect, $username);
		$querry="SELECT * FROM ACCOUNTS ";
		$querry .= "WHERE USERNAME = '{$safe_username}' LIMIT 1";
		//$querry .= "LIMIT 1";
		//TEST IF THERE WAS A QUERRY ERROR
		$result=mysqli_query($connect, $querry);
		if($User = mysqli_fetch_assoc($result)) {
			return $User;
		}
		else {
			echo "no querry";
			return null;
		}
	}
	?>
<?PHP
	function getID($username,$connect) {
		//echo $username;
		//echo "Hi";
		$querry = "SELECT ID FROM ACCOUNTS ";
		$querry .= "WHERE USERNAME = '{$username}'";
		$result = mysqli_query($connect, $querry);
		$id =  mysqli_fetch_assoc($result);
		return $id["ID"];
	
	}
	
	?>
	
	<?php
		//perform querry
		
		$username= $_POST["usr"];
		$password= $_POST["pass"];
		$check= find_account_by_username($username);
		if($check) {
			
			if(crypt($password, $check["PASSWORD"])==$check["PASSWORD"]) {
				//session_start();
				$_SESSION["USR"] = $username;
				$_SESSION["ID"] = getID($username,$connect);
				//echo $username;
				//echo $_SESSION["USR"];
				echo "signed in successfully.";
				$url='http://localhost/project/user/user_homepage.html';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}
			else {
				session_destroy();
				echo "LOGGING FAILED: INCORRECT PASSWORD.";
			}
		}
		else {
			session_destroy();
			echo "LOGGING FAILED: NO SUCH USER EXIST.";
		}
	?>
	
	<?php
		//release stored data
		$check=null;
		
		?>
	
	<?php
		mysqli_close($connect);
		//http://localhost/project/sign/info.html
		?>
		
