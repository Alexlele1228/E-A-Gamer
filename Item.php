<?php
session_start();
?>
<!doctype html>
<html lang="en">
<?php include 'MyFrame.php'; ?>
<?php
$currentName=$_SESSION["currentUser"];
$tableName=$currentName."_CART";
$id = $_GET["id"];
$category = $_GET["category"];

?>
  <body >


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
          <li class="nav-item">
            <a class="nav-link" href="Home.php">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="Cart.php">My Cart</a>;        
          
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Product <span class="sr-only">(current)</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="Category.php?category=Action&tableName=actiongames">Action</a>
              <a class="dropdown-item" href="Category.php?category=FPS&tableName=fpsgames">FPS</a>
              <a class="dropdown-item" href="Category.php?category=Advanture&tableName=advanturegames">Advanture</a>
              <a class="dropdown-item" href="Category.php?category=Casual&tableName=casualgames">Casual</a>
              <a class="dropdown-item" href="Category.php?category=MOBA&tableName=mobagames">Moba</a>
              <a class="dropdown-item" href="Category.php?category=Sports&tableName=sportsgames">Sports</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="HotSale.php">My Cart</a>
            </div>
          </li>

        </ul>
        <p style="color:white;">You looking for : <span id="txtHint"></span><span> ?</span></p>
        <form class="form-inline my-2 my-lg-0"  action="Search.php" method="post">
          <input class="form-control mr-sm-2" name="keyWord"  type="search" placeholder="Search" aria-label="Search" onkeyup="showHint(this.value)">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>


    <main>

 <?php
$itemSQL = "SELECT * FROM " . $category . " WHERE ID=" . $id . "";
$itemResult = $conn->query($itemSQL);
if ($itemResult->num_rows > 0) {
    $itemRow = $itemResult->fetch_assoc();
    $itemName = $itemRow["Name"];
   
    
    $itemDescription = $itemRow["Description"];
    $itemPrice = $itemRow["Price"];
    $picOne=$itemRow["gallery_one"];
    $picTwo=$itemRow["gallery_two"];
    $picThree=$itemRow["gallery_three"];
    $picFour=$itemRow["gallery_four"];
    $picFive=$itemRow["gallery_five"];
    $videoLink=$itemRow["videoLink"];
}

echo "<div id=\"carouselExampleControls\" class=\"carousel slide\" data-ride=\"carousel\">
  <div class=\"carousel-inner\">

    <div class=\"carousel-item active\">
      <img src=".$picOne." class=\"d-block w-100\" alt=\"...\">
   </div>
   
   <div class=\"carousel-item\">
   <img src=".$picTwo." class=\"d-block w-100\" alt=\"...\">
</div>
<div class=\"carousel-item \">
<img src=".$picThree." class=\"d-block w-100\" alt=\"...\">
</div>
<div class=\"carousel-item\">
<img src=".$picFour." class=\"d-block w-100\" alt=\"...\">
</div>
<div class=\"carousel-item \">
<img src=".$picFive." class=\"d-block w-100\" alt=\"...\">
</div>
  </div>
  <a class=\"carousel-control-prev\" href=\"#carouselExampleControls\" role=\"button\" data-slide=\"prev\">
    <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
    <span class=\"sr-only\">Previous</span>
  </a>
  <a class=\"carousel-control-next\" href=\"#carouselExampleControls\" role=\"button\" data-slide=\"next\">
    <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
    <span class=\"sr-only\">Next</span>
  </a>
</div><hr>
";


echo "
<div class=\"container\">
<div class=\"embed-responsive embed-responsive-16by9\">
    <iframe class=\"embed-responsive-item\" src=".$videoLink."></iframe>
</div>
</div>
         <div class=\"jumbotron\">
              <h1 class=\"display-4\" >" . $itemName . "</h1>
              <p class=\"lead\">" . $itemDescription . "</p>
              <hr class=\"my-4\">
              <h3>  $" . $itemPrice . "</h3><br>
                <a id=\"cartBtn\" onclick=\"setSelectedTestPlan(this);\" href=\"javascript:void(0);\" class=\"btn btn-success btn-lg\"  role=\"button\">Add to cart</a>
         </div> ";          
?>

    </main>
    <footer  style="background-color:grey; min-height:200px;" ></footer>
     <!-- BT JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
    <script>
   function setSelectedTestPlan(el) {    
     <?php  
    $sql="INSERT INTO ".$tableName." (GAMEID, CATEGORY) VALUES('".$id."','".$category."')";
    $result=$conn->query($sql);
   
   ?>
    }
</script>
<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>


  </body>
</html>
