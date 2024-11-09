
<?php


	class pSystem{

		
		public $id_cl;
		public $nom;
		public $snom;
		public $ced;
		public $fnac;
		public $e_civil;
		public $nacionalidad;
		public $tipo_habitante;
		public $sector;
		public $casa;
		public $sex;
		public $cel;
		public $pensionado;
		public $discapacidad;
		public $jefeFamilia;

		public $usr;
		public $psswrd;

		public function signin() {
		
			$host = 'localhost';
			$dbname = 'sebuc';
			$usrname = 'root';
			$psswd = '';


			$conn = "mysql:host=".$host.";dbname=".$dbname;
			try {
			$conn = new PDO($conn, $usrname, $psswd);

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "conexion establecida";
			} catch (PDOException $e) {
				echo 'Error al establecer la conexion' . $e->getMessage();
			}


			$usr = $this->usr;
			$psswrd = $this->psswrd;

			$sign = "SELECT * FROM usuarios WHERE user='$usr' AND password='$psswrd'";
			$stmt = $conn->prepare($sign);
			$stmt->execute();

			$rows = $stmt->rowCount();

			if ($rows > 0) {
				header('Location: system.php');
			} else {
				header('Location: ../index.html');
			}
		}



		public function rgstr() {

			include('connection.php');

			$nom = $this->nom;
			$snom = $this->snom;
			$ced = $this->ced;
			$fnac = $this->fnac;
			$nacionalidad = $this->nacionalidad;
			$ecivil = $this->e_civil;
			$casa = $this->casa;
			$cel = $this->cel;
			$tipo_habitante = $this->tipo_habitante;
			$discapacidad = $this->discapacidad;
			$pensionado = $this->pensionado;
			$sex = $this->sex;	
			$jefeFamilia = $this->jefeFamilia;	

			$objConn = new Conexion();
			$conn = $objConn->connect();

			$add_pple = "INSERT INTO habitantes(nombres, apellidos, nacionalidad, cedula, id_edoCivil, fecha_nacimiento, id_tipoHabitante, telefono, discapacidad, pensionado, id_poligonal, id_jefeFamilia) VALUES ('$nom', '$snom', '$nacionalidad', '$ced', '$ecivil', '$fnac', '$tipo_habitante', '$cel', '$discapacidad', '$pensionado', '$poligonal', '$jefeFamilia');";
			$consulta = $conn->prepare($add_pple);
			$consulta->execute();
		}

			
	    public function list() {
	    	include('connection.php');

	    	$objConn = new Conexion();
	    	$conn = $objConn->connect();

	        $query = "SELECT * FROM habitantes;";
	                        
	        $consulta = $conn->prepare($query);
	        $consulta->execute();
	        $lista = array();

	        while($row = $consulta->fetch(PDO::FETCH_OBJ)) {
	            $objClSystem = new pSystem();

	            $objClSystem->id_cl = $row->id;
	            $objClSystem->nom = $row->nombres;
	            $objClSystem->snom = $row->apellidos;
	            $objClSystem->ced = $row->cedula;
	            $objClSystem->nacionalidad = $row->nacionalidad;
	            $objClSystem->e_civil = $row->id_edoCivil;
	            $objClSystem->fnac = $row->fecha_nacimiento;
	            $objClSystem->tipo_habitante = $row->id_tipoHabitante;
	            // $objClSystem->casa = $row->casa_id;
	            $objClSystem->cel = $row->telefono;
	            $objClSystem->discapacidad = $row->discapacidad;
	            $objClSystem->pensionado = $row->pensionado;
	            // $objClSystem->sex = $row->sexo;

	            $lista[] = $objClSystem;
	        }

	        return $lista;

	        $consulta=null;
	        $conn->dsconnect();
	    }

	    public function listBosses() {
	    	include('connection.php');

	    	$objConn = new Conexion();
	    	$conn = $objConn->connect();

	        $query = "SELECT * FROM habitantes WHERE tipo_habitante = 'Jefe de Familia';";
	                        
	        $consulta = $conn->prepare($query);
	        $consulta->execute();
	        $lista = array();

	        while($row = $consulta->fetch(PDO::FETCH_OBJ)) {
	            $objClSystem = new pSystem();

	            $objClSystem->id_cl = $row->id;
	            $objClSystem->nom = $row->nombres;
	            $objClSystem->snom = $row->apellidos;
	            $objClSystem->ced = $row->cedula;
	            $objClSystem->nacionalidad = $row->nacionalidad;
	            $objClSystem->e_civil = $row->e_civil;
	            $objClSystem->fnac = $row->fecha_nac;
	            $objClSystem->tipo_habitante = $row->tipo_habitante;
	            $objClSystem->casa = $row->casa_id;
	            $objClSystem->cel = $row->tlf_cel;
	            $objClSystem->discapacidad = $row->discapacidad;
	            $objClSystem->pensionado = $row->pensionado;
	            $objClSystem->sex = $row->sexo;

	            $lista[] = $objClSystem;
	        }

	        return $lista;

	        $consulta=null;
	        $conn->dsconnect();
	    }

	    public function handicapped() {
	    	include('connection.php');

	    	$objConn = new Conexion();
	    	$conn = $objConn->connect();

	    	$sql = "SELECT * FROM habitantes WHERE discapacidad != '' and discapacidad != 'Ninguna' and discapacidad != 'No posee' and discapacidad != 'Seleccione ....';";

	    	$stmt = $conn->prepare($sql);
	    	$stmt->execute();

	    	$lista = array();

	    	while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	            $objClSystem = new pSystem();

	            $objClSystem->id_cl = $row->id_habitante;
	            $objClSystem->nom = $row->nombres;
	            $objClSystem->snom = $row->apellidos;
	            $objClSystem->ced = $row->cedula;
	            $objClSystem->nacionalidad = $row->nacionalidad;
	            $objClSystem->e_civil = $row->id_edoCivil;
	            $objClSystem->fnac = $row->fecha_nacimiento;
	            $objClSystem->tipo_habitante = $row->id_tipoHabitante;
	            // $objClSystem->casa = $row->casa_id;
	            $objClSystem->cel = $row->telefono;
	            $objClSystem->discapacidad = $row->discapacidad;
	            // $objClSystem->pensionado = $row->pensionado;
	            // $objClSystem->sex = $row->sexo;

	            $lista[] = $objClSystem;
	        }

	        return $lista;

	        $stmt=null;
	        $conn->dsconnect();
	    }

	    public function pOriental() {
	    	include_once('connection.php');

	    	$objConn = new Conexion();
	    	$conn = $objConn->connect();

	    	$sql = "SELECT habitantes.id, nombres, apellidos, sexo, cedula, nacionalidad, e_civil, fecha_nac, tipo_habitante, casa_id FROM habitantes INNER JOIN casas, poligonal WHERE habitantes.casa_id=casas.id && casas.id_poligonal = poligonal.id && poligonal.id = 1;";

	    	$stmt = $conn->prepare($sql);
	    	$stmt->execute();

	    	$lista = array();

	    	while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
	            $objClSystem = new pSystem();

	            $objClSystem->id_cl = $row->id;
	            $objClSystem->nom = $row->nombres;
	            $objClSystem->snom = $row->apellidos;
	            $objClSystem->ced = $row->cedula;
	            $objClSystem->nacionalidad = $row->nacionalidad;
	            $objClSystem->e_civil = $row->e_civil;
	            $objClSystem->fnac = $row->fecha_nac;
	            $objClSystem->tipo_habitante = $row->tipo_habitante;
	            $objClSystem->casa = $row->casa_id;
	            $objClSystem->sex = $row->sexo;

	            $lista[] = $objClSystem;
	        }

	        return $lista;

	        $stmt=null;
	        $conn->dsconnect();
	    }

	    public function update() {
	    	include('connection.php');

	    	$id = $this->id_cl;
	    	$nom = $this->nom;
			$snom = $this->snom;
			$ced = $this->ced;
			$fnac = $this->fnac;
			$nacionalidad = $this->nacionalidad;
			$ecivil = $this->e_civil;
			$casa = $this->casa;
			$cel = $this->cel;
			$tipo_habitante = $this->tipo_habitante;
			$discapacidad = $this->discapacidad;
			$pensionado = $this->pensionado;
			$sex = $this->sex;	

	    	$objConn = new Conexion();
	    	$conn = $objConn->connect();

	    	$query = "UPDATE habitantes SET 
	    				nombres = '$nom',
						apellidos = '$snom',
						cedula = '$ced',
						nacionalidad = '$fnac',
						e_civil = '$ecivil',
						fecha_nac = '$fnac',
						tipo_habitante = '$tipo_habitante',
						casa_id = '$casa',
						tlf_cel = '$cel',
						discapacidad = '$discapacidad',
						pensionado = '$pensionado',
						sexo = '$sex'
						WHERE id = $id;";
			$stmt = $conn->prepare($query);
			$stmt->execute();

	    }

	    public function listHouse() {
	    	include('connection.php');

	    	$objConn = new Conexion();
	    	$conn= $objConn->connect();

	    	$query="SELECT * FROM casas";

	    	$consulta= $conn->prepare($query);

	    	$consulta->execute();

	    	$lista = array();

	    	while($rows = $consulta->fetch(PDO::FETCH_OBJ)) {
	    		$objClSystem = new pSystem();

	    		$objClSystem->id_cl = $rows->id;

	    		$objClSystem->casa = $rows->nro_casa;

	    		$lista[] = $objClSystem;
	    	}

	    	return $lista;

	    	$consulta=null;
	    	$objConn->dsconnect();
	    }



	}

?>