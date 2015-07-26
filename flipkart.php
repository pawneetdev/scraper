<?php

require_once "core.php";
function flipkart($search)
{

    $search = str_replace(" ", "%20", $search);

    $url = "http://www.flipkart.com/search?q=$search";

    $html = getHTMLcode($url);

    $regex = '/<a class="fk-display-block" data-tracking-id="prd_title" href="[^"]*" title="(?P<name>[^"]*)">/'; //(?P<name>[^<]*)/';  //*"([^"]*)>/';
    preg_match_all($regex, $html, $title);

    $regex = '/data-src="(?P<img>[^"]*)"/';
    preg_match_all($regex, $html, $image);

    $regex = '/<span class="fk-font-17 fk-bold">(?P<cost>[^<]*)<\/span>/';
    preg_match_all($regex, $html, $price);

    if(empty(@$price[cost]))
    {
    $regex = '/<span class="fk-font-12">(?P<cost>[^<]*)<\/span>/';
    preg_match_all($regex, $html, $price);
    }
   
    return Array(@$title[name],@$image[img],@$price[cost]);

}

?>
