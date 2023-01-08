<?php 

?>
<hr>
<button onclick="location.href='./'" > Volver </button>
<br><br>
<table>
 <tr><td>id:</td> 
 <td><input type="number" name="id" value="<?=$cli->id ?>"  readonly > </td>
 <td rowspan="7">
<?php 
if($_GET['id']>10){
    //valor de 1-11 por que si no los nombre de las imagenes no coinciden los id grandes al no tener una bbdd de img asignada a cada id
$resta = $_GET['id']%10;
}else{
    $resta = $_GET['id'];
}
?>
<img src="app/uploads/00000<?=$resta?>.jpg"></img></td> 
</tr>
 <tr><td>first_name:</td> 
 <td><input type="text" name="first_name" value="<?=$cli->first_name ?>" readonly > </td></tr>
 </tr>
 <tr><td>last_name:</td> 
 <td><input type="text" name="last_name" value="<?=$cli->last_name ?>" readonly ></td></tr>
 </tr>
 <tr><td>email:</td> 
 <td><input type="email" name="email" value="<?=$cli->email ?>"   readonly  ></td></tr>
 </tr>
 <tr><td>gender</td> 
 <td><input type="text" name="gender" value="<?=$cli->gender ?>" readonly ></td></tr>
 </tr>
 <tr><td>ip_address:</td> 
 <td><input type="text" name="ip_address" value="<?=$cli->ip_address ?>" readonly ></td></tr>
 </tr>
 <tr><td>telefono:</td> 
 <td><input type="tel" name="telefono" value="<?=$cli->telefono ?>" readonly ></td></tr>
 </tr>
 </table>
 
<form>
<input type="hidden"  name="id" value="<?=$cli->id ?>">
<button type="submit" name="nav-detalles" value="Anterior"> Anterior  </button>
<button type="submit" name="nav-detalles" value="Siguiente"> Siguiente  </button>
<button type="submit" name="nav-detalles" value="Imprimir"> Imprimir  </button>
</form> 


