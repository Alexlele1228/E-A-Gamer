<html>
<body>

<?php  
$serverName='localhost';
$username='root';
$password='root';
$DBName='mydb';

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
        session_start();
        $_SESSION["currentUserName"]=$name;
        header('Location: '.$uri.'/dashboard/Home.php');
    }else{
        $alert="Incorrect password, Please try again.";
       echo "<script>alert('{$alert}')</script>";
       header( 'refresh:0;  /dashboard/Login.html');
    }
    
}else{
    echo "User not exsits!<br><br>";
    header( 'refresh:3;  /dashboard/Login.html');
    print("Redirecting in 3 seconds.....");
   
}


?>

</body>
</html>