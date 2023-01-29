/**
 * Funciones auxiliares de javascripts 
 */
import Map from 'ol/Map.js';
import View from 'ol/View.js';
import OSM from 'ol/source/OSM.js';
import TileLayer from 'ol/layer/Tile.js';


function confirmarBorrar(nombre,id){
  if (confirm("¿Quieres eliminar el cliente:  "+nombre+"?"))
  {
   document.location.href="?orden=Borrar&id="+id;
  }
}

//api desde js
function consumirAPI(ip){
  fetch("http://ip-api.com/json/"+ip)
  .then(response => response.json())
  .then(data => console.log(data.countryCode))
  .catch(error => console.error(error))
}


