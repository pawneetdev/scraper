<head>
	<link rel = "stylesheet" href = "style.css">
</head>

<?php

require "core.php";

$url = "http://www.flipkart.com/search?q=mobile&as=off&as-show=on&otracker=start";

$html = getPriceFromFlipkart($url);
		
$regex = '/<a class="fk-display-block" data-tracking-id="prd_title" href="[^"]*" title="[^"]*">(?P<name>[^<]*)<\/a>/';  //*"([^"]*)>/';
preg_match_all($regex, $html, $title);

$regex = '/data-src="(?P<img>[^"]*)"/';
preg_match_all($regex, $html, $image);

$regex = '/<span class="fk-font-17 fk-bold">(?P<cost>[^<]*)<\/span>/';
preg_match_all($regex, $html, $price);

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
