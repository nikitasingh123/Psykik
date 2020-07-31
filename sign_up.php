<?php
	/*function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
	*/
	
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
	
	
	?>
	
	<?php
		//perform querry
		
		$Fname=$_POST['f1'];		
		$Lname=$_POST['f2'];
		$Phone=$_POST['f3'];
		$Email=$_POST['f4'];
		$Pass=$_POST['f5'];
		$Username=$_POST['f6'];
		
		$Fname= mysqli_real_escape_string($connect, $Fname);
		$Lname= mysqli_real_escape_string($connect, $Lname);
		$Phone= mysqli_real_escape_string($connect, $Phone);
		$Email= mysqli_real_escape_string($connect, $Email);
		$Username= mysqli_real_escape_string($connect, $Username);
		//$Pass= mysqli_real_escape_string($connect, $Pass);
		
		$hash_format = "$2y$10$";
		$salt = "Salt22CharactersOrMore";
		$format_and_salt = $hash_format . $salt;
		$hash = crypt ($Pass, $format_and_salt);
		
		
		$querry="INSERT INTO ACCOUNTS (";
		$querry .= "FIRST_NAME, LAST_NAME, PHONE_NUMBER, EMAIL, PASSWORD, USERNAME ";
		$querry .= ") VALUES (";
		$querry .= " '{$Fname}', '{$Lname}', {$Phone}, '{$Email}', '{$hash}', '{$Username}'";
		$querry .= ") ";
		//$querry .= "LIMIT 1";
		//TEST IF THERE WAS A QUERRY ERROR
		$result=mysqli_query($connect, $querry);
		if(!$result) {
			echo("sign up failed");
			$url='sign_up.html';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}
		else {
			echo "signed up successfully.";
			$url='info.html';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}
	?>
	
	<?php
		//release stored data
		$result=null;
		
		?>
	
	<?php
		//redirect($connect);
		?>
	<?php
		//http_redirect("info.html");
		
		?>
