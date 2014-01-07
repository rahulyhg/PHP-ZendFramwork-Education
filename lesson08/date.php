<html>
<head>
<title>Time and date</title>

</head>
<body>

<?php
echo "<p>Today it's " . date ( "l" ) . "</p>";
echo "<p>It's been exactly " . time() . " seconds since January 1, 1970, 12:00 PM, GMT </ p> ";
echo "<p>January 1, 1970 was a " . date("l",0) . "</p>";
echo mktime (2,56,0,7,21,1969);
echo date("l", mktime(2,56,0,7,21,1969));

?>
	
	</body>
</html>