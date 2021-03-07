<?php
header('Content-Type:application/rdf+xml .rss .rss;charset=UTF-8');
if (!isset($channel)) {
	$channel = array();
}
if (!isset($channel['title'])) {
	$channel['title'] = $title_for_layout;
}

echo $this->Rss->document(
	array(
		'xmlns:dc' => "http://purl.org/dc/elements/1.1/",
		'xmlns:sy'=>"http://purl.org/rss/1.0/modules/syndication/",
		'xmlns:admin'=>"http://webns.net/mvcb/",
		'xmlns:rdf'=>"http://www.w3.org/1999/02/22-rdf-syntax-ns#"	
	),
	$this->Rss->channel(
		array(), $channel, $this->fetch('content')
	)
);