<?php
	
	$template = "<gpx><wpt lat=\"{{__LAT__}}\" lon=\"{{__LON__}}\"></wpt></gpx>";
	
	$content = str_replace("{{__LAT__}}", $_POST['lat'], $template);
	$content = str_replace("{{__LON__}}", $_POST['lon'], $content);

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/playerLocation.gpx", "wb");
	fwrite($fp, $content);
	fclose($fp);
	
	exec('osascript -s o /Users/Andrea/Documents/Sviluppo/iOS/FakemonGo/web/updateLocation.applescript 2>&1', $output, $return_var);
	
	echo $return_var;
?>