<?php
function crudOrdenar($orden,$primero,$cuantos){
    $db = AccesoDatos::getModelo();
    $tvalores = $db->ordenarTabla($orden,$primero,$cuantos);
    include_once "app/views/list.php";    
    
}


function crudImprimirPDF($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    crearPdf($cli);
    
}
function crudBorrar ($id){    
    $db = AccesoDatos::getModelo();
    $tuser = $db->borrarCliente($id);
}

function crudTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function crudAlta(){
    $cli = new Cliente();
    $orden= "Nuevo";
    include_once "app/views/formulario.php";
}



function crudDetalles($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/detalles.php";
}

function crudDetallesSiguiente($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteSiguiente($id);
    include_once "app/views/detalles.php";
}

function crudDetallesAnterior($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteAnterior($id);
    include_once "app/views/detalles.php";
}


function crudModificar($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden="Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();
    $cli->id            =$_POST['id'];
    $cli->first_name    =$_POST['first_name'];
    $cli->last_name     =$_POST['last_name'];
    $cli->email         =$_POST['email'];	
    $cli->gender        =$_POST['gender'];
    $cli->ip_address    =$_POST['ip_address'];
    $cli->telefono      =$_POST['telefono'];
    $db = AccesoDatos::getModelo();
    //Antes de guardar el cliente coprobar que el email y el telefono no estan repetidos
    $emailValor = $db->comprobarExisteEmail($cli->email);
    if($emailValor==0 && filter_var($cli->ip_address,FILTER_VALIDATE_IP) && preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',$cli->telefono)){
      $db->addCliente($cli);
    }else{
        crudAlta();
    }
    
    //devolver errores comprobar que el nombre y el apellido no esten vacios  
}

function crudPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $cli = new Cliente();

    $cli->id            =$_POST['id'];
    $cli->first_name    =$_POST['first_name'];
    $cli->last_name     =$_POST['last_name'];
    $cli->email         =$_POST['email'];	
    $cli->gender        =$_POST['gender'];
    $cli->ip_address    =$_POST['ip_address'];
    $cli->telefono      =$_POST['telefono'];
    $db = AccesoDatos::getModelo();
    $emailValor = $db->comprobarExisteEmail($cli->email);
    if($emailValor==0 && filter_var($cli->ip_address,FILTER_VALIDATE_IP) && preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',$cli->telefono)){
        $db->modCliente($cli);
    }
   
    
}


