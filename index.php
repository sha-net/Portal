<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include 'calendar.php';
include 'postgresdb.php';
 
$calendar = new Calendar();
$pgdb = new PostgresDB(); 
echo $calendar->show();

$pgdb->dbConnect();
$pgdb->dbCreateTBLHSS();
$pgdb->dbClose();
?>
</body>
</html>    