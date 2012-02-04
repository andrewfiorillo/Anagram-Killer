<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?

/*

$string = $_SERVER["QUERY_STRING"];

function anagram($string) {
	
	if ($string) {
		
		$dictionary = file("dict.txt");
		$string_chars = count_chars(trim(strtoupper($string)));

		foreach ($dictionary as $entry) {

			$entry_chars = count_chars(trim(str_replace("\r\n","",$entry)));
			
			if($string_chars == $entry_chars) { $matches .= "<li>$entry</li>"; }
			
		}
		$matches = strtolower($matches);	
	}
	
	if ($matches) {
		return "<strong>Results:</strong><br /><ul>$matches</ul>";
	}
	else {
		return "No Matches";
	}
}

*/

?>
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	
	<title>Scrabble Killer</title>
	
	<link rel="stylesheet" href="css/default.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
			
		$('#solver').submit(function() {
			
			$('#string').blur();
			$("#output").html("");
			$('#loading').show();
			
			var get_string = $('#string').attr("value");
			
			$.ajax({
				url: "matches.php",
				data: { string : get_string },
				type: "GET",
				dataType: "html",
				success: function(data){
					$('#loading').hide();		
					$("#output").html(data);
					$("#string").focus();
				}
			});
			
			return false;
			
		});
					
	});
	</script>

</head>

<body>

	<div id="container">
	
		<div id="input">
			<form name="solver" method="GET" action="matches.php" id="solver">
				<input type="text" name="string" id="string" placeholder="Search..." />
				<input name="submit" type="submit" id="submit" value="Submit" />
				<div style="clear:both;"></div>
			</form>
		</div>
		
		<img src="images/loading.gif" id="loading" style="display:none;" />
		
		<div id="output"></div>
		
	</div>
	
</body>
</html>

