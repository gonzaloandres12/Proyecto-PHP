<?php 

?>
<hr>
<button onclick="location.href='./'" > Volver </button>
<br><br>
<table>
 <tr><td>id:</td> 
 <td><input type="number" name="id" value="<?=$cli->id ?>"  readonly > </td>
 <?php
 $images = glob('app/uploads/*.jpg');
 $randomImage = $images[array_rand($images)];
 ?>
 <td rowspan="7"><img src="<?=$randomImage?>" alt="fotoUsuario" width="200" height="300"></img>
 <div id="map" style="width: 100%"></div>
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

 <picture>
  <source
    type="image/webp"
    srcset="https://flagcdn.com/w2560/<?=paisApartideIP($cli->ip_address)?>.webp" width="200" height="100">
  <source
    type="image/png"
    srcset="https://flagcdn.com/w2560/<?=paisApartideIP($cli->ip_address)?>.png" width="200" height="100">
  <img
    src="https://flagcdn.com/w2560/<?=paisApartideIP($cli->ip_address)?>.png"

    alt="<?=paisApartideIP($cli->ip_address)?>" width="200" height="100">
</picture>
<div id="popup"></div>
<div id="info"></div>
<form>
<input type="hidden"  name="id" value="<?=$cli->id ?>">
<button type="submit" name="nav-detalles" value="Anterior"> Anterior  </button>
<button type="submit" name="nav-detalles" value="Siguiente"> Siguiente  </button>
<button type="submit" name="nav-detalles" value="Imprimir"> Imprimir  </button>
</form> 


