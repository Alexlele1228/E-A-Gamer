<?php  
$serverName = 'localhost';
$username = 'id14943896_root';
$password = 'Qpd6u(O<_42h@|FK';
$DBName = 'id14943896_mydb';

$name=$_POST["name"];
$userPassword=$_POST["password"];
$userPhoneNumber=$_POST["phone"];

$conn=new mysqli($serverName,$username,$password,$DBName);

if($conn->connect_error){
   die('connection fail :'.$conn->connect_error);
}

$firstSQL="SELECT * FROM users WHERE USERNAME=\"$name\"";
$firstResult=$conn->query($firstSQL);
if($firstResult->num_rows<=0){
   $sql="INSERT INTO users (USERNAME, USERPASSWORD, PHONENUMBER) VALUES('".$name."','".$userPassword."','".$userPhoneNumber."')";
   $result=$conn->query($sql);
   $dbUserName=$name."_CART";
   $sqlB="CREATE TABLE ".$dbUserName."(`ID` INT NOT NULL AUTO_INCREMENT , `GAMEID` INT NOT NULL , `CATEGORY` VARCHAR(500) NOT NULL , PRIMARY KEY (`ID`))";
   $resultB=$conn->query($sqlB);
   if($result>0&&$resultB>0)
       header("refresh:3; /Home.php?currentUser=".$name);
    else
       header('refresh:3;  /Error.php');
}
else
       header('refresh:3;  /signUp.html');
?>







