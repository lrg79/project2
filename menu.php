<?php
//code based off of lecture 3
$menu_items = array(
	'Add' => 'index.php',
	'Search' => 'search.php',
	'View' => 'view.php',
	'Reset/Delete' => 'delete.php'
	);
echo '<ul>';

foreach($menu_items as $title => $link){
	print("<li class = 'toolbar'><a href ='$link'>$title</a><li>");
}

echo '</ul>';

?>