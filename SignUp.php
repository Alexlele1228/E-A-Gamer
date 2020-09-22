<html>
<body>

<?php  
$serverName='localhost';
$username='root';
$password='root';
$DBName='mydb';

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


if($result>0)
{
    session_start();
    $_SESSION["currentUserName"]=$name;
        $alert="Successfully registered, redirect in 3 seconds....";
       echo "<script>alert('{$alert}')</script>";
       header( 'refresh:3;  /dashboard/Home.php');
    
    
    
}else{
    echo "Registration failed, redirect in 3 seconds....<br><br>";
    header( 'refresh:3;  /dashboard/signUp.html');
    print("Redirecting in 3 seconds.....");
   
}
}else{
    echo "User name already exsits, redirect in 3 seconds....<br><br>";
    header( 'refresh:3;  /dashboard/signUp.html');
    print("Redirecting in 3 seconds.....");
}



?>

</body>
</html>