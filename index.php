<!doctype html>
<html lang="en">
<?php include 'MyFrame.php'; ?>

  <body  >


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand "  href="index.php">E&A</a>
      <a class="navbar-brand" href="#">
        <img src="Logo.png" width="30" height="30" alt="" loading="lazy"/>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Login.html">Login</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Product
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


    <main >
       
 <br> <div style="text-align:center;">
 <h1>Hottest Games</h1></div><br>
  <div style="max-width:50%;   left:0;  right:0; margin:0 auto;" >
<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
  $THISSQL = "SELECT * FROM allgames ";
   $ThisResult = $conn->query($THISSQL);
           
   $maxIdSQL= "SELECT COUNT(*) FROM allgames";
   $maxIdResult=$conn->query($maxIdSQL);
   $idRow = $maxIdResult->fetch_assoc();
  $maxID= $idRow["COUNT(*)"];
  echo "<br>";
  $imgArr=array();
  $titleArr=array();
  $desArr=array();
  $idArr=array();
  for($i=0;$i<10;$i++){
    $ranID=rand(1,$maxID);
   
   
         array_push($idArr,$ranID);
        
          $randSQL = "SELECT * FROM allgames WHERE ID=$ranID";
          $randResult = $conn->query($randSQL);
          $randRow = $randResult->fetch_assoc();
        
          array_push( $titleArr,$randRow["Name"]);
          array_push($desArr,$randRow["Description"]);
          array_push($imgArr,$randRow["poster"]) ;
    

  }

             for($j=0;$j<count($idArr);$j++)
             {
            //   $imgRow = $ThisResult->fetch_assoc();
              if($j!=0){
              echo "
              <div class=\"carousel-item\" data-slide-to=".$j." data-interval=\"5000\">
                <img src=".$imgArr[$j]." class=\"d-block w-100\" alt=\"...\">
                <div class=\"carousel-caption d-none d-md-block\">
                <h5>".$titleArr[$j]."</h5>
                <p>".$desArr[$j]."</p>
                </div>
              </div>";
              }else{
                echo "<div class=\"carousel-item active\" data-slide-to=".$j." data-interval=\"5000\">
                <img src=".$imgArr[$j]." class=\"d-block w-100\" alt=\"...\">
                <div class=\"carousel-caption d-none d-md-block\">
                <h5>".$titleArr[$j]."</h5>
                <p>".$desArr[$j]."</p>
                </div>
              </div>";
              }
            }
             ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<hr>
<br><br>

    <div style="display:flex; justify-content:space-around;">
          <?php
             $newSQL = "SELECT * FROM categories ";
             $newResult = $conn->query($newSQL);
             
    
             for($i=0;$i<$newResult->num_rows;$i++)
             {
              $categoriesRow = $newResult->fetch_assoc();
               echo "<div class=\"card\" style=\"width: 18rem;\">
               <img src=".$categoriesRow["IMG"]." class=\"card-img-top\" alt=\"...\">
               <div class=\"card-body\">
                 <h5 class=\"card-title\">".$categoriesRow["Name"]."</h5>
                 <div style=\"min-height:400px; over-flow:hidden;\">
                 <p class=\"card-text\">".$categoriesRow["Description"]."</p></div>
               </div>
               <div class=\"card-body\">
                 <a href=\"Category.php?category=".$categoriesRow["Name"]."&tableName=".$categoriesRow["tableName"]."\"  role=\"button\" class=\"btn btn-info\">Check</a>
                         </div>
             </div>";
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
