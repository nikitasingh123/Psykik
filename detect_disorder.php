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
	
	?>
<?php
	
	
	
	
	?>
<?php
	$querry="INSERT INTO QUES(";
	$querry .= "ID, GENDER, ORIGIN, RELATION, WORK, WEIGHT_GAINED, PROBLEM_SLEEPING, TRAUMA, NERVOUS, EAT, DEPRESS, APPETITE, OCD ";
	$querry .= ") VALUES (";
	$querry .= " 1, '{$_POST["gender"]}', '{$_POST["origin"]}', '{$_POST["relation"]}', '{$_POST["work"]}', '{$_POST["weight"]}', '{$_POST["sleep"]}', '{$_POST["trauma"]}', '{$_POST["nervous"]}', '{$_POST["eat"]}', '{$_POST["depress"]}', '{$_POST["appetite"]}', '{$_POST["ocd"]}'";
	$querry .= "); ";
	//echo $querry."<br>";
	$result=mysqli_query($connect, $querry);
	?>
<?php
$dep=0;
$ptsd=0;
$anx=0;
$ocd=0;
$eat=0;
 if($_POST['relation']=="divorced")
 {
$dep++;
$anx++;
$ptsd++;
}
 elseif($_POST['relation']=="separated")
{
$dep++;
$anx++;
$ptsd++;
}
 elseif($_POST['relation']=="widowed")
{
$dep++;
$anx++;
$ptsd++;
}

elseif($_POST['work']=="retired")
 {
$dep++;
$ptsd++;
}

elseif($_POST['work']=="home")
  {
$dep++;
$anx++;
$ptsd++;
}

 elseif($_POST['work']=="no")
  {
$dep++;
$anx++;
$ptsd++;
}
if($_POST['weight']=="yes")
	{
$dep++;
$anx++;
$ptsd++;
$eat++;
}

if($_POST['sleep']=="moderately")
 {
$dep++;
$anx++;
$ptsd++;
}
 elseif($_POST['sleep']=="extremely")
 {
$dep+=2;
$anx+=2;
$ptsd+=2;
}
if($_POST['trauma']=="yes")
 {
$dep++;
$ptsd++;
}

if($_POST['nervous']=="sometimes")
 $anx++;
 elseif($_POST['nervous']=="often")
 $anx+=2;
 elseif($_POST['nervous']=="everyday")
 $anx+=3;

if($_POST['depress']=="sometimes")
  {
$dep+=1;
$ptsd+=1;
}
 elseif($_POST['depress']=="often")
 {
$dep+=2;
$ptsd+=2;
}
 elseif($_POST['depress']=="everyday")
 {
$dep+=3;
$ptsd+=3;
}


if($_POST['appetite']=="sometimes")
 {
$dep+=1;
$ptsd+=1;
$eat+=1;
}

 elseif($_POST['appetite']=="often")
  {
$dep+=2;
$ptsd+=2;
$eat+=2;
}

 elseif($_POST['appetite']=="everyday")
  {
$dep+=3;
$ptsd+=3;
$eat+=3;
}
if($_POST['ocd']=="yes")
$ocd++;


if(($dep>$anx) && ($dep>$ptsd) && ($dep>$eat)&& $ocd) 
include 'depo.html'; 
else
include 'dep.html';
if(($anx>$dep) && ($anx>$ptsd) && ($anx>$eat) && $ocd ) 
include 'anxo.html'; 
else
include 'anx.html';

if(($ptsd>$anx) && ($ptsd>$dep) && ($ptsd>$eat) && $ocd) 
include 'ptsdo.html'; 
else
include 'ptsd.html';

if(($eat>$anx) && ($eat>$ptsd) && ($eat>$dep) && $ocd) 
include 'eato.html';
else
include 'eat.html';

//echo $dep." ".$ptsd." ".$ocd." ".$eat;
?>
