<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="welcome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2800e9fd71.js"></script>
    <title>Welcome</title>
    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #808080;
  color: black;
}

.topnav a.active {
  background-color: #FFA500;
  color: white;
}

h2 {text-align: center;}
h4 {text-align: center;}

</style>
</head>
<body>

<?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <header>
      <div class="topnav">
      <a href="welcome.php" class="active" id="head-big">MEDiserve</a>
        <a href="buy_medicines.php">Buy Medicines</a>
        <a href="doctors.php">Doctors</a>
        <a href="health_report.html">Health Report</a>
        <a href="logout.php">Logout</a>
        
        <div id="div-input">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <form class="example" action="action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            <a href="shopping_cart.php"><i id="cart" class="fa fa-shopping-cart" style="font-size:35px;color:red"></i></a>
            </form>
        </div>
    </div>
    </header>

    <div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 4</div>
    <img src="./1p.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 4</div>
    <img src="./2nd.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 4</div>
    <img src="./3rd.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 4</div>
    <img src="./4th.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
</div>
<h2><b>“You have to choose the correct technology and solution and wrap the people and process around to link them together. People, process, and technology are interrelated. You can’t talk about one without the others.”</b></h2>
<h4><i>– James Woodson, MD, FACEP and CEO of Pulsara, a provider of mobile communication network software for healthcare systems</i></h4>
<br>

<p style="font-size:30px"><b>What is the Healthcare Software Industry ?</b></p>
<p style="font-size:20px">They may ask: why is the healthcare industry growing? The reason is the emergence of new diagnostic and treatment options provided by innovative technologies including those related to medical mobile app development.</P>

<p style="font-size:30px"><b>What is MEDiserve and features ?</b></p>
<p style="font-size:20px">The reason behind such popularity is pure and simple – medical applications can help enhance the interaction between patients and healthcare providers across multiple touch points:</p>
<ul>

<li>Improve patient experience. Medical apps for patients come in handy in handling ordinary cases as well as in any situations.</li><br>
<li>You have record of Medical Product which is you buy online. Modern healthcare software solutions ensure storing all the medical data safe.</li><br>
<li>We Have One more Option For medical shoppers , their Items sell on online platform.</li><br>
<li>Also we have Give online Doctor Consultation. These options can help many patiens who need treatment at home.</li><br>
<li>We will provide one more feature so that the full body report of the patiens can be online so that they can take the treatment by showing the report to any doctor anywhere.</li><br>
<li>Medical apps for doctors are an indispensable tool when it comes to orchestrating massive personal and patient datasets, optimizing communication, and making their job less stressful with minimum paperwork.</li><br>
</ul>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</body>
</html>