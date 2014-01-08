<html>
<head>
<title>Write to a text file</title>
</head>
<body>

	<h1>Adding a text block to a text file:</h1>
	<form action="myfile.php" method='post'>
		<textarea name='textblock'></textarea>
		<input type='submit' value='Add text'>
	</form>

	<?php
	
	// Open the text file
	$f = fopen ( "textfile.txt", "w" );
	
	// Write text
	fwrite ( $f, $_POST ["textblock"] );
	
	// Close the text file
	fclose ( $f );
	
	// Open file for reading, and read the line
	$f = fopen ( "textfile.txt", "r" );
	
	// Read text
	echo fgets ( $f );
	fclose ( $f );
	
	?>
	
	</body>

</html>
