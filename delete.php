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
<div class = "container">
			<div class = "left">
				<h2> Click to reset the entire database </h2>
				<div>
					<form action = "delete.php" method = "post">
						<input type = "submit" name = "butt1" value = "Reset" id = "addButton" />
					</form>
				</div>
			</div>
			<div class = "right">
				<img src = "images/pikachu.png" alt = "pikachu" id = "pikachu"/>
			</div>
		</div>

		<?php

			if(isset($_POST['butt1'])){
				$file_pointer = fopen("data.txt", "w+");
				if($file_pointer){
					fwrite($file_pointer, "");
					fclose($file_pointer);
					echo '<p class = "error"> Database Reset </p>';
				}
				else{
					echo'hi';
				}	
			}

			function isMatch($name, $gen, $type, $echos){
				 if( ($name != null && strcasecmp($echos[0], $name) == 0 ) || ($name == null) 
					&& (($gen != null && $gen == $echos[1]) || $gen == null)
					&& (($type != null && $type == $echos[2]) || $type == null) ) {
				 	return true;
				 }
				 
				 return false;
			}

		?>
	</body>
</html>