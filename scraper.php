<head>
	<link rel = "stylesheet" href = "style.css">
</head>

<?php

require "core.php";

$search = $_GET['search'];

$search = str_replace(" ", "%20", $search);

$url = "http://www.flipkart.com/search?q=$search";

$html = getPriceFromFlipkart($url);
		
$regex = '/<a class="fk-display-block" data-tracking-id="prd_title" href="[^"]*" title="(?P<name>[^"]*)">/'; //(?P<name>[^<]*)/';  //*"([^"]*)>/';
preg_match_all($regex, $html, $title);

$regex = '/data-src="(?P<img>[^"]*)"/';
preg_match_all($regex, $html, $image);

$regex = '/<span class="fk-font-17 fk-bold">(?P<cost>[^<]*)<\/span>/';
preg_match_all($regex, $html, $price);

if(empty($price[cost]))
{
	$regex = '/<span class="fk-font-12">(?P<cost>[^<]*)<\/span>/';
	preg_match_all($regex, $html, $price);
}
	
$i=0;

echo "<ol>";

foreach ($title[name] as $a)
{
	echo "<li><div class = 'product'>";
	echo "<img src = '".$image[img][$i]."'>";
	echo "<br>";
	echo $a;
	echo "<div class = 'price'>".$price[cost][$i]."</div>";
	echo "</div></li>";
	$i++;
}

echo "</ol>";

?>
