<?
	
$dictionary = file("dict.txt");

foreach ($dictionary as $entry) {
	
	echo '"' . trim($entry) . '"' . ', ';
	
}

?>