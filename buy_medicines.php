<?php

session_start();

require_once ('CreateDb.php');
require_once ('component.php');


// create instance of Createdb class
$database = new CreateDb("login_register_pure_coding", "Producttb");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'buy_medicines.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>
<HTML>
<HEAD>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="shopping_cart.css">
<TITLE></TITLE>
<link href="shopping_cart.css" type="text/css" rel="stylesheet" />
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
</HEAD>
<BODY>
<div class="topnav">
      <a href="welcome.php" class="active" id="head-big">MEDiserve</a>
        <a href="buy_medicines.php">Buy Medicines</a>
        <a href="doctors.php">Doctors</a>
        <a href="health_report.php">Health-Report</a>
        <a href="logout.php">Logout</a>
        
        <div id="div-input">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <form class="example" action="action_page.php">
            <input type="text" placeholder="Search." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            <a href="shopping_cart.php"><i id="cart" class="fa fa-shopping-cart" style="font-size:35px;color:red"><span id="cart-count"></span></i></a>
            </form>
        </div>
</div>
<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
            ?>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</BODY>
</HTML>