<html>

<head>
<title>Writing to a text file</title>
</head>
<body>

	<?php
	
	// Open the text file
	$f = fopen ( "textfile.txt", "w" );
	
	// Write text line
	fwrite ( $f, "PHP is fun!" );
	
	// Close the text file
	fclose ( $f );
	
	// Open file for reading, and read the line
	$f = fopen ( "textfile.txt", "r" );
	echo fgets ( $f );
	
	fclose ( $f );
	
	?>

	</body>
</html>