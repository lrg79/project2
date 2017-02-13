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
				<form action = "search.php" method = "post" id = "entry">
					<?php include ("form.php");?>
					<div>
						<input type = "submit" value = "Search" id = "addButton" name = "butt" />
					</div>
				</form>
			</div>
			<div class = "right">
				<img src = "images/pikachu.png" alt = "pikachu" id = "pikachu"/>
			</div>
		</div>
		<div class = "view">
			<?php

			if(isset($_POST['butt'])){
				doStuff();
			}

			function doStuff(){
				if(isset($_POST['pokeName']) && preg_replace('/[^a-z]/i', '', $_POST['pokeName']) != ""){
					$name = filter_input(INPUT_POST, 'pokeName', FILTER_SANITIZE_STRING);
				}
				else{
					$name = null;
				}
				if(isset($_POST['genNum'])){
					$gen = $_POST['genNum'];				
				}
				else{
					$gen = null;
				}
				$type = $_POST['pokeType'];
				if($type == ""){
					$type = null;
				}
				$cats = array("Name: ", "Generation: ", "Type: ");
				$file_pointer = fopen('data.txt', 'r+');

				if($file_pointer){
					while(!feof($file_pointer)){
						$line = fgets($file_pointer);
						$echos = explode("\t", $line);
						if(!$line == ""){
							$echos[2] = str_replace("\n", "", $echos[2]);
							if(isMatch($name, $gen, $type, $echos)){
								for($i = 0; $i < 3; $i++){
									echo '<br>'. '<b>' . $cats[$i];
									echo '</b>'. '</br>' . $echos[$i]. " ";
								}
								echo '<br>';
							}
						}
					}

					fclose($file_pointer);
				} else{
					echo 'cannot open file';
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
		</div>
	</body>
</html>