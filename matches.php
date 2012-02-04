<?

$string = $_GET["string"];
	
if ($string) {
	
	$dictionary = file("dict.txt");
	//$string_chars = count_chars(trim(strtoupper($string)));
	
	$string_chars = str_split(trim(strtoupper($string)));
	sort($string_chars);

	foreach ($dictionary as $entry) {

		//$entry_chars = count_chars(trim(str_replace("\r\n","",$entry)));
		$entry_chars = str_split(trim(str_replace("\r\n","",$entry)));
		sort($entry_chars);
		
		if($string_chars == $entry_chars) { $matches .= "<li><span>$entry</span></li>"; }
		
	}
	$matches = strtolower($matches);
}

if ($matches) {
	echo "<ul>$matches</ul>";
}
else {
	echo "<div style='padding-top:5px;'>No Matches</div>";
}


?>