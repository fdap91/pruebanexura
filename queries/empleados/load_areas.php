<?php 
include ("../conet.php");
    include ("../functions.php");
$resultados = array();


$empleados = new Database();
$listado=$empleados->readAreas();


while ($row=mysqli_fetch_object($listado)){
    $id=$row->id;
    $nombre=$row->nombre; 

    $arrayName = array('id' => $id,
                            'nombre' => $nombre,);
    array_push($resultados, $arrayName);
}

 
echo json_encode($resultados);
