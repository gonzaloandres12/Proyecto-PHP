<?php
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link href="web/css/default.css" rel="stylesheet" type="text/css" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
	<div id="container" style="width: 400px;">
		<div id="header">
			<h1>ACCESO AL SISTEMA</h1>
		</div>
		<?php
		
		if($_SESSION['intentos'] > 3){
			echo "<p>Numero de intentos supertado cierra el navegador para volver a intentarlo</p>";
		}else{?>
		<div id="content">	
				<form method="GET">
					<table style="border: node; ">
						<tr>
							<td>identificador:</td>
							<td><input type="text" name="login" size="20"></td>
						</tr>
						<tr>
							<td>Contraseña:</td>
							<td><input type="text" name="passwd" size="20"></td>
						</tr>
					</table>
					<input type="submit" name="orden" value="EntrarLogin">
				</form>			
		</div>
		<?php }?>
		<p>
	</div>
</body>

</html>