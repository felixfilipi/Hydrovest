<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
Setting up database....
<br>

<?php

	require_once "functions.php";

	createTable(
		"Admin",
		"AdminId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		AdminUser VARCHAR(128) NOT NULL,
		AdminPass VARCHAR(128) NOT NULL"
	);

	createTable(
		"SensorData",
		"DataId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		ScanDatetime DATETIME,
		Tds DOUBLE NOT NULL,
		Turbidity DOUBLE NOT NULL,
		Temperature DOUBLE NOT NULL,
		Humidity DOUBLE NOT NULL,
		State VARCHAR(128)"
	);

	createTable(
		"LeafPrediction",
		"ImageId INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
		"DataId INT NOT NULL,
		ImageName VARCHAR(255),
		ImagePath VARCHAR(255),
		Prediction VARCHAR(128)
		FOREIGN KEY (DataId) REFERENCES SensorData(DataId)"
	);

?>

</body>
</html>
