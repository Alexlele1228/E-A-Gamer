<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Use title if it's in the page YAML frontmatter -->
    <title>E&A Gamer</title>

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <!--link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="Logo.png" rel="icon" type="image/png" />


  </head>

  <body  >
<?php
$serverName = 'localhost';
$username = 'root';
$password = 'root';
$DBName = 'mydb';


$conn = new mysqli($serverName, $username, $password, $DBName);



if ($conn->connect_error) {

    die('connection fail :' . $conn->connect_error);
}


$keyWord=$_POST["keyWord"];

 $sql = "SELECT * FROM allgames WHERE Description like \"%" . $keyWord . "%\"";
 $result = $conn->query($sql);
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand "  href="Home.php">E&A</a>
      <a class="navbar-brand" href="#">
        <img src="Logo.png" width="30" height="30" alt="" loading="lazy"/>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Login.html">Logout</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Product
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="Action.php">Action</a>
              <a class="dropdown-item" href="FPS.php">FPS</a>
              <a class="dropdown-item" href="Advanture.php">Advanture</a>
              <a class="dropdown-item" href="Casual.php">Casual</a>
              <a class="dropdown-item" href="MOBA.php">Moba</a>
              <a class="dropdown-item" href="Sports.php">Sports</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="HotSale.php">Hot Sale</a>
            </div>
          </li>

        </ul>
        <form class="form-inline my-2 my-lg-0"  action="search.php" method="post">
          <input class="form-control mr-sm-2" name="keyWord"  type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>


    <main style="padding:20px;">
    <div class="row">
          <?php
             for($i=0;$i<$result->num_rows;$i++)
             {
                $row = $result->fetch_assoc();
                $secSQL="SELECT * FROM ".$row["tableName"]." where Name=\"".$row["Name"]."\"";
                $secResult = $conn->query($secSQL);
                $secRow=$secResult->fetch_assoc();
             
               echo " <div class=\"col\"><div class=\"card\" style=\"width: 18rem;\">
               <img src=".$row["IMG"]." class=\"card-img-top\" alt=\"...\">
               <div class=\"card-body\">
                 <h5 class=\"card-title\">".$row["Name"]."</h5>
                 <div style=\"height:300px; over-flow:hidden;\">
                 <p class=\"card-text\">".$row["Description"]."</p></div>
               </div> <div class=\"card-body\">
               <a href=\"Item.php?category=".$row["tableName"]."&id=".$secRow["ID"]."\"  role=\"button\" class=\"btn btn-info\">Check</a>
                       </div>
                        </div></div>";
            
              
             }
             
             
            

?>
 </div>
 
    </main>
    <footer  style="background-color:grey; min-height:200px;" ></footer>
     <!-- BT JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>


  </body>
</html>
