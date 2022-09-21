<?php
	include ("../conet.php");
	include ("../functions.php");

				$empleado= new Database();
				$result = array('error' => 0, );
				if(isset($_POST) && !empty($_POST)){
					$nombres = $empleado->sanitize($_POST['nombrecompleto']);
					$correo = $empleado->sanitize($_POST['correoelectronico']);
					$sexo = $empleado->sanitize($_POST['sexo']);
					$area = $empleado->sanitize($_POST['area']);
					$descripcion = $empleado->sanitize($_POST['descripcion']);
					$boletininformativo = $empleado->sanitize($_POST['boletininformativo']);
					$arrayroles = $_POST['arrayroles'];

					if($nombres == "" || $correo == "" || $sexo == "" || $area == "" || $descripcion == "" || count($arrayroles) == 0){
						$result["error"] = 2;
					}else{

						$res = $empleado->createEmpleado($nombres, $correo, $sexo, $area, $boletininformativo,$descripcion);
						if($res > 0){
							$idempleado = $res;

							for ($i=0; $i < count($arrayroles); $i++) { 
								$idrol = $empleado->sanitize($arrayroles[$i]);
								$res = $empleado->createEmpleadoRol($idempleado, $idrol);

							}

							$result["error"] = 1;

						} 
					}
					
					
					
				}

echo json_encode($result);