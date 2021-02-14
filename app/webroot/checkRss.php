<?php
if(isset($_GET['val'])){
	$url = rawurldecode($_GET['val']);
	$headers = get_headers($url);
	foreach($headers as $h){
		if((stripos($h,'Content-Type') === false)){
			continue;
		}
		else{
			$contentType = $h;
			break;
		}
	}
	if(empty($contentType)){
		echo 'false';
	}
	else{
		if(preg_match('/(text|application)\/(xml|html|rdf|rss)\+{0,1}(xml){0,1}/i',$contentType)){
			echo 'true';
		}
		else{
			echo 'false';
		}
	}
}
