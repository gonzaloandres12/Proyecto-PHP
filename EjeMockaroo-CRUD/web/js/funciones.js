/**
 * Funciones auxiliares de javascripts 
 */
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