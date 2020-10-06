<?php  
$serverName = 'localhost';
$username = 'id14943896_root';
$password = 'Qpd6u(O<_42h@|FK';
$DBName = 'id14943896_mydb';

$name=$_POST["name"];

$userPassword=$_POST["password"];


$conn=new mysqli($serverName,$username,$password,$DBName);

if($conn->connect_error){

    die('connection fail :'.$conn->connect_error);
}

$sql="SELECT * FROM users WHERE UserName='".$name."'";
$result=$conn->query($sql);

if($result->num_rows>0)
{
    $row=$result->fetch_assoc();
    if($row["UserPassword"]==$userPassword)
    {
        header("refresh:3; /Home.php?currentUser=".$name);
    }else{

       header( 'refresh:0;  /Login.html');
    }
    
}else{
  
    header( 'refresh:3;  /Login.html');
  
   
}


?>
