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
				<form action = "index.php" method = "post" id = "entry">
					<?php include ("form.php"); ?>
					<div>
						<input type = "submit" name = "butt" value = "Add" id = "addButton" />
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
				$cats = array("Name: ", "Generation: ", "Type: ");
				include ("validate.php");
				$valid = true;

				if($name == null || $gen == null || $type == null){
					$valid = false;
				}

				if($valid === true){
					$file_pointer = fopen('data.txt', 'a+');
					$name = ucfirst(strtolower($name));
					$contents =$name . "\t" . $gen . "\t" . $type . "\n";
					
					if(!isDups($file_pointer, $contents)){
						fwrite($file_pointer, $contents);
					}
					else{
						echo '<p class = "error"> you have just entered a duplicate </p>';
					}

					fclose($file_pointer);
				}
				else{
					echo '<p class = "error">one or more inputs was invalid</p>';
				}

				$file_pointer = fopen('data.txt', 'r+');

				if($file_pointer){
					while(!feof($file_pointer)){
						$line = fgets($file_pointer);
						$echos = explode("\t", $line);
						if(!$line == ""){
							for($i = 0; $i < count($echos); $i++){
								echo '<br>'. '<b>' . $cats[$i] . '</b>'. '</br>' . $echos[$i]. " ";
							}
						echo '<br>';
						}
					}

					fclose($file_pointer);
				}
				else{
					echo 'file cannot be opened';
				}
		}

		function isDups($file_pointer, $contents){
			if($file_pointer){
				while(!feof($file_pointer)){
					$line = fgets($file_pointer);
					if($contents == $line){
						return true;
					}
				}
				return false;
			}
		}
		?>
		</div>
	</body>
</html>