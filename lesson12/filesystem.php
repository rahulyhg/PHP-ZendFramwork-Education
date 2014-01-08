<html>

<head>
<title>Filesystem</title>
</head>
<body>
		
	<?php
	
	// Find and write properties
	echo "<h1>file: lesson14.php</h1>";
	echo "<p>Was last edited: " . date ( "r", filemtime ( "lesson14.php" ) );
	echo "<p>Was last opened: " . date ( "r", fileatime ( "lesson14.php" ) );
	echo "<p>Size: " . filesize ( "lesson14.php" ) . " bytes";
	
	?>

	</body>
</html>