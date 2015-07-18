<?php

$url = "http://www.flipkart.com/search?q=mobile&as=off&as-show=on&otracker=start";

//$response = getPriceFromFlipkart($url);
 
//echo json_encode($response);
 
/* Returns the response in JSON format */
 
function getPriceFromFlipkart($url) {
 
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 10.10; labnol;) ctrlq.org");
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$html = curl_exec($curl);
	curl_close($curl);
 
	//$regex = '/<meta itemprop="price" content="([^"]*)"/';
	//preg_match($regex, $html, $price);
 
	//$regex = '/<h1[^>]*>([^<]*)<\/h1>/';
	//preg_match($regex, $html, $title);
		
	//$regex = '/<a class="fk-display-block" data-tracking-id="prd_title" href="[^"]* title="([^"]*)">/';
	
	//$title = Array();
	
	//for($i=0; $i<5; $i++)
	//{
	$regex = '/<a class="fk-display-block" data-tracking-id="prd_title" href="([^"]*)"[^>]*>/';
	preg_match_all($regex, $html, $title);
	//}
	
	$regex = '/<a class="fk-display-block" data-tracking-id="prd_title" href="[^"]*" title="([^"]*)">/';  //*"([^"]*)>/';
	preg_match_all($regex, $html, $image);
	
	//$regex = '/data-src="([^"]*)"/i';
	//preg_match($regex, $html, $image);
 
	//if ($price && $title && $image) {
	//	$response = array("price" => "Rs. $price[1].00", "image" => $image[1], "title" => $title[1], "status" => "200");
	//} else {
	//	$response = array("status" => "404", "error" => "We could not find the product details on Flipkart $url");
	//}
	
	//echo "------------<br>";
	//print_r($image);
	//echo "<br>------------";
	//echo "<br><br>";
	//print_r($title);
	for($i=0; $i<19; $i++)
	{
		echo $image[1][$i];
		echo "<br>";
		echo $title[1][$i];
		echo "<br><br>";
	}
	echo "<br>";
	echo $title[1];
	
	echo "<br>";
	//echo "$title[1]<br>Rs. $price[1].00";
 
	//return $response;
}
