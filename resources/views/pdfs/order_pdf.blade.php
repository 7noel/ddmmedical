<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Holaaaaaaaaaa</h1>
			<div class="date">
				<?php 
				//setlocale(LC_TIME, 'spanish');
				//\Carbon::setUtf8(true);
				$dt=\Carbon::now();
				 ?>
				Lima, {{ $dt->formatLocalized('%A %d de %B de %Y') }}
			</div>
</body>
</html>