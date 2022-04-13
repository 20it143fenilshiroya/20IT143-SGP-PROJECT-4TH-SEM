<?php

session_start();

require_once ("CreateDb.php");
require_once ("component.php");

$db = new CreateDb("login_register_pure_coding", "Producttb");
if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'shopping_cart.php'</script>";
          }
      }
  }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="shopping_cart.css">
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
#header-wrap input {
    position: relative;
    top: -5px;
    width: 16vw;
    padding: 10px 10px;
    font-size: 15px;
    border-radius: 10px;
    margin: 0px 20px 0px 0px;
    outline: none;
    background-color: lightgray;
} 
#head-left {
    display: inline-flex;
}
#div-input {
    float: right;
}

* {
    box-sizing: border-box;
  }
  
  /* Style the search field */
  form.example input[type=text] {
    padding: 10px;
    font-size: 14px;
    border: 1px solid grey;
    float: left;
    width: 50%;
    background: #f1f1f1;
    margin-top: 5px;
  }
  
  /* Style the submit button */
  form.example button {
    float: left;
    width: 10%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 14px;
    border: 1px solid grey;
    border-left: none; /* Prevent double borders */
    cursor: pointer;
    margin-top: 8px;
    margin-left: 5px;
  }
  
  form.example button:hover {
    background: #0b7dda;
  }
  
  /* Clear floats */
  form.example::after {
    content: "";
    clear: both;
    display: table;
  }

</style>
</head>
<body class="bg-light">
<div class="topnav">
      <a href="welcome.php" class="active" id="head-big">MEDiserve</a>
        <a href="buy_medicines.php">Buy Medicines</a>
        <a href="doctors.html">Doctors</a>
        <a href="health_report.php">Health Report</a>
        <a href="logout.php">Logout</a>
        
        <div id="div-input">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <form class="example" action="action_page.php">
            <input type="text" placeholder="Search." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            
            </form>
        </div>
        </div>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
		<br>
		<br>	
		<hr>
                <h6>My Cart</h6>
                <hr>
                <?php
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">40</h6>
                        <hr>
                        <h6>$<?php
                            echo $total+"40";
                            ?></h6>
                    </div>
                </div>
                <button><a href="./payment/index.html">Payment</a></button>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
