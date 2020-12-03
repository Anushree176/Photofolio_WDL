<?php
$title="Template";
$imgArr=["../assets/img/Template2/photographer.jpg","../assets/img/Template2/ocean.jpg","../assets/img/Template2/ocean2.jpg","../assets/img/Template2/falls2.jpg","../assets/img/Template2/mountainskies.jpg","../assets/img/Template2/mountains2.jpg"];
$img=array();
include_once '../dbConfig.php';
session_start();
// Get images from the database
if(basename(__FILE__, '.php')!="tem2")
{
    $una=basename(__FILE__, '.php');
    $title=basename(__FILE__, '.php');
}
else{
$una=$_SESSION['uname'];
}
$que = "SELECT * FROM page where userName='".$una."';";
$qu=mysqli_query($db,$que);
$r=mysqli_fetch_assoc($qu);
$pname=$r["pName"];
$bname=$r["bName"];
$query = "SELECT * FROM image where uname='".$una."' ORDER BY id DESC;";
$q=mysqli_query($db,$query);
if($q->num_rows > 0){
    while($row = $q->fetch_assoc()){
        $imageURL = $row["image"];
        array_push($img,$imageURL);}}
?>


<!DOCTYPE html>
<html>
<title>W3.CSS Template1</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body,
  h1 {
    font-family: "Montserrat", sans-serif
  }

  img {
    margin-bottom: -7px
  }

  .w3-row-padding img {
    margin-bottom: 12px
  }
  
</style>

<body >

  <!-- Sidebar   style="background-color:#001a45;" -->
  <nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge" style="display:none;padding-top:150px" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()"
      class="w3-button w3-black w3-xxlarge w3-padding w3-display-topright" style="padding:6px 24px">
      <i class="fa fa-remove"></i>
    </a>
    <div class="w3-bar-block w3-center">
      <a href="#" class="w3-bar-item w3-button w3-text-light-grey w3-hover-black">About</a>
      <a href="#" class="w3-bar-item w3-button w3-text-light-grey w3-hover-black">Photos</a>
      <a href="#" class="w3-bar-item w3-button w3-text-light-grey w3-hover-black">Shop</a>
      <a href="#" class="w3-bar-item w3-button w3-text-light-grey w3-hover-black">Contact</a>
    </div>
  </nav>

  <!-- !PAGE CONTENT! -->
  <div class="w3-content" style="max-width:1500px">

    <!-- Header -->
    <div class="w3-opacity  w3-light-grey">
      <span class="w3-button w3-xxlarge w3-white w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-clear"></div>
      <header class="w3-center w3-margin-bottom">
        <h1 style="letter-spacing: 8px;"><b><?php echo($bname) ?></b></h1>
        <p><h3 style="letter-spacing: 3px;"><b><?php echo($pname) ?></b></h3></p>
       <!-- <p class="w3-padding-16"><button class="w3-button w3-black" onclick="myFunction()">Toggle Grid Padding</button>
        </p>-->
      </header>
    </div>

    <!-- Photo Grid --><div class="w3-row" id="myGrid" style="margin: auto;">
    <?php
    for ($x = 0; $x < count($img); $x++) {
    ?>
    <div class="w3-third modal-image modal-content">
    <img src=<?php echo($img[$x]) ?> alt=""  width="500" height="" onclick="onClick(this)">
    <?php
    //if((int($x) + 1 )%3 == 0){
        ?></div><?php
    //}
    } ?></div>
      <!--<div class="w3-third modal-image modal-content">
        <img src="../assets/img/Template1/rocks.jpg" style="width:100%" onclick="onClick(this)">
        <img src="../assets/img/Template1/lights.jpg" style="width:100%" onclick="onClick(this)">
      </div>

      <div class="w3-third modal-image modal-content">
        <img src="../assets/img/Template1/woods.jpg" style="width:100%" onclick="onClick(this)">
        <img src="../assets/img/Template1/bridge.jpg" style="width:100%" onclick="onClick(this)">
        <img src="../assets/img/Template1/notebook.jpg" style="width:100%" onclick="onClick(this)">
        <img src="../assets/img/Template1/london.jpg" style="width:100%" onclick="onClick(this)">
        <img src="../assets/img/Template1/avatar_g.jpg" style="width:100%" onclick="onClick(this)">
      </div>

      <div class="w3-third modal-image modal-content">
        <img src="../assets/img/Template1/rocks.jpg" style="width:100%" onclick="onClick(this)">
        <img src="../assets/img/Template1/lights.jpg" style="width:100%" onclick="onClick(this)">
      </div>

    </div>-->

    <!-- End Page Content -->
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin-top:128px">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Powered by <a href="../index1.php" target="_blank"
        class="w3-hover-text-green">PHOTOFOLIO</a></p>
  </footer>

  <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
    <img class="w3-modal-content" id="img01" style="width:650px; margin-left:350px;">
  </div>

  <script>
    // Toggle grid padding
    function myFunction() {
      var x = document.getElementById("myGrid");
      if (x.className === "w3-row") {
        x.className = "w3-row-padding";
      } else {
        x.className = x.className.replace("w3-row-padding", "w3-row");
      }
    }

    // Open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.width = "100%";
      document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
    }

    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
    }
  </script>

</body>

</html>