<?php

if (isset($_POST)) {
	
	$n=$_POST["texto2"];
	
	for ($i=0; $i < $n; $i++) { 
		echo '<input type="text" name="respuestas[]" value="" placeholder=""><br>';
	}
}

?>