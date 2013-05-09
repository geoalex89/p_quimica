<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Login Gestion Inventario</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<!--<script type="text/javascript" src="js/jQuery/jQuery.js"></script>-->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>

<div id="loginContainer">
	<h1 class='login'>Acceso a Gestión Inventario</h1>
		<?php if (isset($error)) echo $error; 
		echo $form;
		?>
	<footer class='login'>© Institut PROVENÇANA. c. Sant Pius X, núm 8. 08901.L'Hospitalet de Llobregat
	E-Mail: a8019401@xtec.cat Tel: 933.382.553 Fax: 933.375.735
</footer>	
</div>

</body>
</html>