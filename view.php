<!DOCTYPE html>
	<head>
		<title>Leah Greenstein lrg79 </title>
		<link rel = "stylesheet" type = "text/css" href = "styles/style.css"/>
	</head>
	<div class = "header">
		<img src = "images/header.png" id = "pokepic" alt = "pokedex"/>
	</div>
	<div class = "menu">
		<?php include ('menu.php');?>
	</div>
	<body>
		<h1> The Database </h1>
		<?php
				$file_pointer = fopen('data.txt', 'r+');
				$cats = array("Name: ", "Generation: ", "Type: ");
				if($file_pointer){
					while(!feof($file_pointer)){
						$line = fgets($file_pointer);
						$echos = explode("\t", $line);
						if(!$line == ""){
							for($i = 0; ($i < count($echos) && $i < 3); $i++){
								echo '<br>'. '<b>' . $cats[$i];
								echo '</b>'. '</br>' . $echos[$i]. " ";
							}

							echo '<br>';
						}
					}

					fclose($file_pointer);
				
				}
				else{
					echo 'file cannot be opened';
				}
		?>
	</body>
</html>