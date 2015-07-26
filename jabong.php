
<?php
	require_once "core.php";
	
function jabong($search)
{
	$search=str_replace(" ","%20",$search);
	
	//take the url from user for which data set has to be created
	$url="http://www.jabong.com/find?q=$search";
	
	// to get html code of the url
	$html=getHTMLCode($url);
	
	$regex='/<img src="(?P<img>[^"]*)" width="176" height="255" alt="" title="" class="itm-img" \/>/';
	preg_match_all($regex,$html,$image);
	
	$regex='/<span class="qa-brandTitle fs11 c999 prod-ellipsis">(?P<TITLE>[^<]*)<\/span>/';
	preg_match_all($regex,$html,$title);
	
	$regex='/<strong class="fs16 qa-price">(?P<markedPrice>[^<]*)<\/strong>/';
	preg_match_all($regex,$html,$m_price);
    
    return Array( @$title[TITLE] , @$image[img] , @$m_price[markedPrice] );
	
}

?>
