<?php

$title = $_POST['title'];
$price = $_POST['price'];
$image = $_POST['image'];

$i=0;
$response = Array();

echo '{"products":[<br>';

foreach($title as $a)
{
	echo '{"title":"'.$title[$i].'", "price":"'.$price[$i].'", "image":"'.$image[$i].'"}';
	if(@$title[$i+1])
		echo ',<br>';
	$i++;
}

echo "<br>]}";

?>
