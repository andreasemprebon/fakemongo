<?php
	
	$template = "<gpx><wpt lat=\"{{__LAT__}}\" lon=\"{{__LON__}}\"></wpt></gpx>";

	$content = str_replace("{{__LAT__}}", $_GET['lat'], $template);
	$content = str_replace("{{__LON__}}", $_GET['lon'], $content);

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/playerLocation.gpx", "wb");
	fwrite($fp, $content);
	fclose($fp);

	exec('osascript /Users/Andrea/Documents/Sviluppo/iOS/FakemonGo/web/updateLocation.applescript');
?>