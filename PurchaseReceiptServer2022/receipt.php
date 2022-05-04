<!DOCTYPE html>
<!-- author: Ali Elbekov -->
<html>
<head>
<Title>Purchase/Receipt Server</Title>
</head>
<style>
  .sectionTwo {
    margin-top: 50px;
    background-color: pink;
    width: 300px;
    height: 250px;
    border: solid black 6pt;
    border-style: outset;
    border-color: red;
    padding: 10px;
  }
</style>

<body>

<?php
// This one line of HTML code assumes you have name='quantity' in your html <form> inside Purchase.html
$firstName = $_POST["name"];
$lastName = $_POST["lastName"];
$selectedState = $_POST["states"];
$zipNumber = $_POST["zip"];
$cityName = $_POST["city"];
$quantity = $_POST["quantity"];
$selected = $_POST["size"];
$space = strpos($selected, " ");
$cost = substr($selected, 0, $space);
$cost = floatval($cost);
$size = substr($selected, $space);
$date = date("d-m-Y");

$str = '<div class = "sectionTwo";>'. PHP_EOL;
$str .= '<h3>Receipt</h3>' . PHP_EOL;
$str .= 'Purchase Date: '.$date ."<br>" .PHP_EOL;
$str .= 'Purchased '.$quantity. ' item(s) of size '. "'".$size. "'" ." at ". $cost. " each<br>". PHP_EOL;
$totalCost = $quantity*$cost; 
number_format($totalCost, 2);
$str .= 'Total Cost $'.$totalCost."<br><br>" . PHP_EOL;


$strFieldSet = '<fieldset class = "fieldSet">'. PHP_EOL;
$strFieldSet .= '<legend>Ship to</legend>' .PHP_EOL;
$strFieldSet .= $firstName . " ". $lastName . " ". "<br>" .PHP_EOL;
$strFieldSet .= $cityName . ", ". $selectedState . "<br>" .PHP_EOL;
$strFieldSet .= $zipNumber .PHP_EOL;
$strFieldSet .= "</fieldset>" .PHP_EOL;
$str .= $strFieldSet .PHP_EOL;
$str .= "</div>" .PHP_EOL;

echo $str;

// The following echo represents a test that we can access the values of one input fields.
?>
</body>
</html>