<?php 
include ("../conet.php");
    include ("../functions.php"); 

$idempleado = $_POST['idempleado'];
$empleados = new Database();
$listado=$empleados->readEmpleadosId($idempleado);


while ($row=mysqli_fetch_object($listado)){
    $id=$row->id;
    $nombre=$row->nombre; 
    $email=$row->email; 
    $sexo=$row->sexo; 
    $area_id =$row->area_id;
    $boletin =$row->boletin;
    $descripcion =$row->descripcion;
    $listadoroles = $empleados->readEmpleadosRoles($id);  
    $arrayroles = array();

    while ($rowroles=mysqli_fetch_object($listadoroles)){
        array_push($arrayroles, $rowroles->rol_id);
    }
 

    $arrayName = array('id' => $id,
                        'nombre' => $nombre,
                        'email' => $email,
                        'sexo' => $sexo,
                        'area_id' => $area_id,
                        'boletin' => $boletin,
                        'descripcion' => $descripcion,
                        'roles' => $arrayroles,); 
}

 
echo json_encode($arrayName);
