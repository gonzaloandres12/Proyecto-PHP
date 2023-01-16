<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<form>
<button type="submit" name="orden" value="Nuevo"> Cliente Nuevo </button><br>
<p>Usuario:<?=isset($_SESSION['user'])?$_SESSION['user']:""?></p>
<p>Rol:<?=isset($_SESSION['rol'])?$_SESSION['rol']:""?></p>
</form>
<br>
<?php 
if(isset($_SESSION['rol'])){
    if($_SESSION['rol'] == 1){?>
<table>
<tr><th>id</th><th> <a href="?orden=Ordenar&name=first_name">first_name</a></th>
<th><a href="?orden=Ordenar&name=email">email</a></th>
<th><a href="?orden=Ordenar&name=gender">gender</a> </th>
<th><a href="?orden=Ordenar&name=ip_address">ip_address</a></th>
<th><a href="?orden=Ordenar&name=telefono">teléfono</a></th></tr>
<?php foreach ($tvalores as $valor): ?>
<tr>
<td><?= $valor->id ?> </td>
<td><?= $valor->first_name ?> </td>
<td><?= $valor->email ?> </td>
<td><?= $valor->gender ?> </td>
<td><?= $valor->ip_address ?> </td>
<td><?= $valor->telefono ?> </td>
<td><a href="#" onclick="confirmarBorrar('<?=$valor->first_name?>',<?=$valor->id?>);" >Borrar</a></td>
<td><a href="?orden=Modificar&id=<?=$valor->id?>">Modificar</a></td>
<td><a href="?orden=Detalles&id=<?=$valor->id?>" >Detalles</a></td>

<tr>
<?php endforeach ?>
</table>
<?php } elseif ($_SESSION['rol'] == 0) { ?>
    <table>
<tr><th>id</th><th> <a href="?orden=Ordenar&name=first_name">first_name</a></th>
<th><a href="?orden=Ordenar&name=email">email</a></th>
<th><a href="?orden=Ordenar&name=gender">gender</a> </th>
<th><a href="?orden=Ordenar&name=ip_address">ip_address</a></th>
<th><a href="?orden=Ordenar&name=telefono">teléfono</a></th></tr>
<?php foreach ($tvalores as $valor): ?>
<tr>
<td><?= $valor->id ?> </td>
<td><?= $valor->first_name ?> </td>
<td><?= $valor->email ?> </td>
<td><?= $valor->gender ?> </td>
<td><?= $valor->ip_address ?> </td>
<td><?= $valor->telefono ?> </td>
<td><a href="?orden=Detalles&id=<?=$valor->id?>" >Detalles</a></td>

<tr>
<?php endforeach ?>
</table>
<?php } }?>    
<form>
<br>
<button type="submit" name="nav" value="Primero"> << </button>
<button type="submit" name="nav" value="Anterior"> < </button>
<button type="submit" name="nav" value="Siguiente"> > </button>
<button type="submit" name="nav" value="Ultimo"> >> </button>
<button type="submit" name="Salir" value="Salir">Salir del Usuario</button>
</form>
<!--Con la api de google maps puedo obtener un mapa pero tengo que registrame y conseguir un toker para poder utilizarla--¡>
<?php
$map_url = "https://maps.googleapis.com/maps/api/staticmap?center=40.714728,-73.998672&zoom=12&size=400x400&key=YOUR_API_KEY&signature=YOUR_SIGNATURE";
?>

<img src="<?php echo $map_url; ?>" />