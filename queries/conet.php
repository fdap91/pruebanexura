<?php
class Database
{
    private $con;
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "prueba_tecnica_dev";
    function __construct()
    {
        $this->connect_db();
    }
    public function connect_db()
    {
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if (mysqli_connect_error())
        {
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }

    public function sanitize($var)
    {
        $return = mysqli_real_escape_string($this->con, $var);
        return $return;
    }

    public function createEmpleado($nombre, $email, $sexo, $area_id, $boletin, $descripcion)
    {
        $sql = "INSERT INTO `empleado` (nombre, email, sexo, area_id, boletin,descripcion) 
	VALUES ('$nombre', '$email', '$sexo', '$area_id', '$boletin', '$descripcion')";
        $res = mysqli_query($this->con, $sql);
        $idinsert = mysqli_insert_id($this->con);
        if ($res)
        {
            return $idinsert;
        }
        else
        {
            return 0;
        }
    }

    public function updateEmpleado($idempleado, $nombre, $email, $sexo, $area_id, $boletin, $descripcion)
    {
        $sql = "UPDATE empleado SET nombre='$nombre', 
			email='$email', 
			sexo='$sexo', area_id='$area_id', boletin='$boletin', descripcion='$descripcion' WHERE id=$idempleado";
        $res = mysqli_query($this->con, $sql);
        if ($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function createEmpleadoRol($empleado_id, $rol_id)
    {
        $sql = "INSERT INTO `empleado_rol` (empleado_id , rol_id) 
	VALUES ('$empleado_id', '$rol_id')";
        $res = mysqli_query($this->con, $sql);
        $idinsert = mysqli_insert_id($this->con);
        if ($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function readEmpleados()
    {
        $sql = "SELECT * FROM empleado";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function readRoles()
    {
        $sql = "SELECT * FROM roles";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function readAreas()
    {
        $sql = "SELECT * FROM areas";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function simpleRead($sql)
    {
        $res = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_object($res))
        {
            return $row->nombre;
        }
    }

    public function readEmpleadosId($id)
    {
        $sql = "SELECT * FROM empleado WHERE id =" . $id;
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function readEmpleadosRoles($id)
    {
        $sql = "SELECT * FROM empleado_rol WHERE empleado_id =" . $id;
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    public function deleteEmpleado($id)
    {
        $sql = "DELETE FROM empleado WHERE id=$id";
        $res = mysqli_query($this->con, $sql);
        if ($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deleteEmpleadoRol($idempleado)
    {
        $sql = "DELETE FROM empleado_rol WHERE empleado_id =$idempleado";
        $res = mysqli_query($this->con, $sql);
        if ($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}

