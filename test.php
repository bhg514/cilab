<form name='fr' action='test1.php' method='POST'>
	<input type='hidden' name='var' value='aaaaaaaaaaaaa'>

</form>

<?php
	
	echo "<script type='text/javascript'> document.fr.submit(); </script>";

?>