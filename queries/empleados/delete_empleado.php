<?php 
	$result = array('error' => 0, );

if (isset($_POST['idempleado'])){
	include ("../conet.php");
	include ("../functions.php");
	
	$empleado = new Database();
	$id=intval($_POST['idempleado']);
	$res = $empleado->deleteEmpleado($id);
	if($res){
		$empleado->deleteEmpleadoRol($id);
		$result["error"] = 1;
	}else{
		$result["error"] = 2;
	}
}


echo json_encode($result);
?>