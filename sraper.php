<head>
	<link rel = "stylesheet" href = "style.css">
</head>

<?php

//INCLUDED FILES
include_once "amazon.php";
include_once "flipkart.php";

echo "<center>";
include "search.htm";
echo "</center>";

//INITIALIZED ARRAYS FOR DATA, TITLE, IMAGE AND PRICE

$amazon_data = Array();
$amazon_title = Array();
$amazon_img = Array();
$amazon_price = Array();

$flipkart_data = Array();
$flipkart_title = Array();
$flipkart_img = Array();
$flipkart_price = Array();

//IF SEARCH IS NOT FETCHED THROUGH GET METHOD, KILL REST OF THE PAGE (USED WHEN THE PAGE IS OPENED INITIALLY)
if(!isset($_GET['search']))
	die();

//CALLED FUNCTIONS THAT FETCH HTML CODE FROM RESPECTIVE SITES.
$flipkart_data = flipkart($_GET["search"]);
$amazon_data = amazon($_GET['search']);

//STORING DATA IN VARIABLES FOR AMAZON
$j=0;

foreach ($amazon_data[0] as $x)
{
    $amazon_title[$j] = $x;
    $j++;
    if($j>19)
		break;
}

$j=0;

foreach (@$amazon_data[1] as $x)
{
    $amazon_img[$j] = $x;
    $j++;
    if($j>19)
		break;
}

$j=0;

foreach ($amazon_data[2] as $x)
{
    $amazon_price[$j] = $x;
    $j++;
    if($j>19)
		break;
}

//STORING DATA IN VARIABLES FOR FLIPKART
$j=0;

foreach ($flipkart_data[0] as $x)
{
    $flipkart_title[$j] = $x;
    $j++;
}

$j=0;

foreach ($flipkart_data[1] as $x)
{
    $flipkart_img[$j] = $x;//chop($x, "/");
    $j++;
}

$j=0;

foreach ($flipkart_data[2] as $x)
{
    $flipkart_price[$j] = $x;
    $j++;
}

//DISPLAYING RESULTS FOR FLIPKART
$j=0;

echo "<div class = 'main_div' style = 'float: left;'><center>";
echo "FLIPKART";
foreach ($flipkart_title as $x)
{
    echo "<div class = 'product'>";
    echo "<img src = '".@$flipkart_img[$j]."' style = 'width: 100px; height: 200px;'><br>";
    echo @$x."<br>";
    echo "<div class = 'price'>".@$flipkart_price[$j]."</div>";
    echo "</div>";
    $j++;
}

$a = ['json', 'xml'];

foreach($a as $x)
{
echo "<form action = '$x.php' method = 'POST' target = '_blank'>";
//for($i=0; $i<20; $i++)
$i=0;
foreach ($flipkart_title as $title)
{
	echo "<input type = 'hidden' name = 'title[]' value = '$flipkart_title[$i]'>";
	echo "<input type = 'hidden' name = 'price[]' value = '$flipkart_price[$i]'>";
	echo "<input type = 'hidden' name = 'image[]' value = '$flipkart_img[$i]'>";
    $i++;
}
echo "<input type = 'submit' value = 'Download $x'>
</form>";
}

echo "</center></div>";

//DISPLAYING RESULTS FOR AMAZON
$j=0;

echo "<div class = 'main_div' style = 'float: right;'><center>";
echo "AMAZON";

foreach ($amazon_title as $x)
{
    echo "<div class = 'product'>";
    echo "<img src = '".@$amazon_img[$j]."' style = 'width: 190px; height: 200px;'><br>";
    echo @$x."<br>";
    echo "<div class = 'price'>".@$amazon_price[$j]."</div>";
    echo "</div>";
    $j++;
}

$a = ['json', 'xml'];

foreach($a as $x)
{
echo "<form action = '$x.php' method = 'POST' target = '_blank'>";
for($i=0; $i<20; $i++)
{
	echo "<input type = 'hidden' name = 'title[]' value = '$amazon_title[$i]'>";
	echo "<input type = 'hidden' name = 'price[]' value = '$amazon_price[$i]'>";
	echo "<input type = 'hidden' name = 'image[]' value = '$amazon_img[$i]'>";
}
echo "<input type = 'submit' value = 'Download $x'>
</form>";
}

echo "</center></div>";

?>
