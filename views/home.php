<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a type="button" href="/recommend">Recomendar</a>
	<?php if (isset($_SESSION['gender'])): ?>
		
		<label>Genero:</label>
		<label><?php echo $_SESSION['gender'] ?></label>

	<?php endif ?>
</body>
</html>