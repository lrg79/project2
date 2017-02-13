<?php
$type_list = array("None", "", "Water", "Fire", "Grass", "Rock", "Poison", "Flying", 
	"Bug", "Ghost", "Normal", "Fairy", "Fighting", "Steel", "Electric", "Ice",
	"Dark", "Ground", "Dragon");

	echo '			<div>
					<h2> Name of Pokemon </h2>
					<input type = "text" name = "pokeName"/>
				</div>

				<div>
					<h2> Generation </h2>
					<select name = "genNum">
						<option value = "">  </option>
						<option value = "1"> 1 </option>
						<option value = "2"> 2 </option>
						<option value = "3"> 3 </option>
						<option value = "4"> 4 </option>
						<option value = "5"> 5 </option>
						<option value = "6"> 6 </option>
						<option value = "7"> 7 </option>
					</select>
				</div>

				<div>
					<h2> Type </h2>
					<select name = "pokeType">';

					for($i = 1; $i < count($type_list); $i++){
						echo "<option value = '" . $type_list[$i] . "'>" . $type_list[$i] . "</option>";
					}

					echo '</select>
				</div>';

	function check_type_match($type){
		global $type_list;
		for($i = 0; $i < count($type_list); $i++){
			if($type === $type_list[$i]){
				return true;
			}
		}

		return false;
	}

?>