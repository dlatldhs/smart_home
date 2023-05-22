<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
</head>
<body>
	<?php
		// header.php 파일을 호출한다.
		include 'header.php';
	?>

	<div>
		<p>내 웹사이트의 콘텐츠입니다. 인닥스</p>
	</div>

	<?php
		// footer.php 파일을 호출한다.
		include 'footer.php';
	?>
</body>
</html>

<!-- 
	create table humidity(
		humidity_id INT PRIMARY KEY AUTO_INCREMENT,
		humidity_val FLOAT NOT NULL,
		room_id INT NOT NULL
	);

	create table air_status(
    air_id INT PRIMARY KEY AUTO_INCREMENT,
    air_status FLOAT NOT NULL,
    room_id INT NOT NULL
	rt timestamp current_timestamp
	);

	
 -->