<html>
<head>
<title>FileSystemObject</title>
</head>
<body>

	<?php
	
	// Opens the folder
	$folder = opendir ( "../../tutorials/php/" );
	
	// Loop trough all files in the folder
	while ( ($entry = readdir ( $folder )) != "" ) {
		echo $entry . "<br />";
	}
	
	// Close folder
	$folder = closedir ( $folder );
	
	?>

	</body>

</html>