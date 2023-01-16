<?php
/*
 *  Funciones para limpiar la entrada de posibles inyecciones
 */

function limpiarEntrada(string $entrada):string{
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = strip_tags($salida); // Elimina marcas
    return $salida;
}
// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada){
 
    foreach ($entrada as $key => $value ) {
        $entrada[$key] = limpiarEntrada($value);
    }
}


function crearPdf($cli){
    require_once 'vendor/autoload.php';

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->AddPage();
    $html = <<<EOD
    <h1>DATOS</h1>
    <h1>Nombre:$cli->first_name</h1>
    <h1>Apellido:$cli->last_name </h1>
    <h1>Email:$cli->email</h1>
    <h1>Genero:$cli->gender </h1>
    <h1>Telefono:$cli->telefono</h1>
    <h1>IP:$cli->ip_address</h1>
    EOD;
    
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    $pdf->Output('example_001.pdf', 'I');
    
}

function paisApartideIP($ip){
    $loc = file_get_contents("http://ip-api.com/json/".$ip);
	$obj = json_decode($loc);
     if($obj->status=='success'){
        return strtolower($obj->countryCode);  
    }
	
}



