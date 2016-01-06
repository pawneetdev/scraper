<?php

$title = $_POST['title'];
$price = $_POST['price'];
$image = $_POST['image'];

$i=0;
$response = Array();

echo '&lt;products&gt;<br><br>';

foreach($title as $a)
{
	echo '&lt;product&gt;<br>&lt;title&gt;'.$title[$i].'&lt;/title&gt;<br>&lt;price&gt;'.$price[$i].'&lt;/price&gt;<br>&lt;image&gt;'.$image[$i].'&lt;/image&gt;<br>&lt;/product&gt;';
	if(@$title[$i+1])
		echo '<br><br>';
	$i++;
}

echo "<br><br>&lt;/products&gt;";

?>
