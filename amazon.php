<?php

require_once "core.php"; 

function amazon($search)
{
    

    $url="http://www.amazon.in/s/ref=nb_sb_noss/280-5472358-5762825?url=search-alias%3Daps&field-keywords=$search";

    $html= getHTMLcode($url);

    $image = '/<img alt="Product Details" src="(?P<img>[^"]*)"/';
    preg_match_all($image,$html,$data);

    $title = '/<h2 class="a-size-medium a-color-null s-inline s-access-title a-text-normal">(?P<val>[^>]*)<\/h2>/';
    preg_match_all($title,$html,$value);

    $price ='/<span class="a-size-base a-color-price s-price a-text-bold"><span class="currencyINR">&nbsp;&nbsp;<\/span>(?P<price>[^>]*)<\/span>/';
    preg_match_all($price,$html,$cost);
    
    return Array(@$value[val], @$data[img], @$cost[price]);

}

?>

 
