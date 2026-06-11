<?php
	$json = '{
		"name" : "Harry Potter and the Goblet of Fire",
		"author" : "J. K. Rowling",
		"year" : "2000",
		"genre" : "Fantasy Fiction",
		"bestseller" : true
	}';
	
	$decoded = json_decode($json, true);
	
	echo "<pre>";
	print_r($decoded);
	echo "</pre>";
?>