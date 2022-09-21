<?php 
include ("../conet.php");
    include ("../functions.php");
$resultados = array();


$empleados = new Database();
$listado=$empleados->readEmpleados();


while ($row=mysqli_fetch_object($listado)){
    $id=$row->id;
    $nombre=$row->nombre; 
    $email=$row->email; 
    $sexo=$row->sexo; 
    $area_id =$row->area_id;
    $boletin =$row->boletin;
    $areanombre = $empleados->simpleRead("SELECT * FROM areas WHERE id=".$area_id);


    if($sexo == 'F'){
        $sexoname = 'Femenino';
    }else{
        $sexoname = 'Masculino';
    }

    if($boletin == 1){
        $boletinname = 'Si';
    }else{
        $boletinname = 'No';
    }

    $arrayName = array('id' => $id,
                        'nombre' => $nombre,
                        'email' => $email,
                        'sexo' => $sexoname,
                        'area_id' => $areanombre,
                        'boletin' => $boletinname,);
    array_push($resultados, $arrayName);
}

 
echo json_encode($resultados);
