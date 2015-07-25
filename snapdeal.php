<?php
 
	require "core.php";

	$url="http://www.snapdeal.com/search?keyword=shoes&santizedKeyword=&catId=&categoryId=&suggested=false&vertical=&noOfResults=20&clickSrc=go_header&lastKeyword=&prodCatId=&changeBackToAll=false&foundInAll=false&categoryIdSearched=&cityPageUrl=&url=&utmContent=&dealDetail=";
	
	$html=getPriceFromFlipkart($url);
	
	//find patterns now
	$regex='/<img  title="" class="gridViewImage" anim=\'true\' src="(?P<img>[^"]*)" border="0"\/>/';
	preg_match_all($regex,$html,$image);
	
	$regex = '/class="hit-ss-logger somn-track prodLink" pogId="[^"]*" pos="[^"]*" hidOmnTrack="">(?P<TITLE>[^>]*)<\/a>/';
	preg_match_all($regex,$html,$title);
	
	
	$i=0;
	 foreach(@$image[img] as $a)
	{
		echo"<img src='$a'>";
		echo @$title[TITLE][$i];
		echo"<br>";
		$i++; 
	} 
	
	


?>
