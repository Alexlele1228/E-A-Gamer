<!doctype html>
<html lang="en">
<?php include 'MyFrame.php'; ?>
<?php

$keyWord=$_POST["keyWord"];

 $sql = "SELECT * FROM allgames WHERE Description like \"%" . $keyWord . "%\"";
 $result = $conn->query($sql);
?>
  <body  >


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
          <a class="nav-link" href="Cart.php">My Cart</a>;        
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
        <p style="color:white;">You looking for : <span id="txtHint"></span><span> ?</span></p>
        <form class="form-inline my-2 my-lg-0"  action="Search.php" method="post">
          <input class="form-control mr-sm-2" name="keyWord"  type="search" placeholder="Search" aria-label="Search" onkeyup="showHint(this.value)">
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
                 <div style=\"min-height:400px; over-flow:hidden;\">
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
