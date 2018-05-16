<?php
    require_once("../db/Database.php");
    require_once("../interfaces/IUsuario.php");

    class Usuario implements IUsuario {
    	private $con;
        private $id;
        private $nombre;
        private $password;
        private $matricula;
        private $carrera;
        private $idproyecto;
        private $nombreProyecto;
        private $alcance;
        private $vision;
        private $fecha_Inicio;
        private $fecha_Fin;

    	  public function __construct(Database $db){
    		    $this->con = new $db;
    	  }

        public function setId($id){
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }

        public function setCarrera($carrera){
            $this->carrera = $carrera;
        }

        public function setProyecto($idproyecto){
            $this->idproyecto = $idproyecto;
        }
        //proyecto
        public function setNombreProyecto($nombreProyecto){
            $this->nombreProyecto = $nombreProyecto;
        }

        public function setAlcance($alcance){
            $this->alcance = $alcance;
        }

        public function setVision($vision){
            $this->vision = $vision;
        }

        public function setFechaInicio($fecha_Inicio){
            $this->fecha_Inicio = $fecha_Inicio;
        }

        public function setFechaFin($fecha_Fin){
            $this->fecha_Fin = $fecha_Fin;
        }

    	public function save() {
    		try{
    			$query = $this->con->prepare('INSERT INTO miembro (nombre, password, matricula, carrera, idproyecto) values (?,?,?,?,?)');
          $query->bindParam(1, $this->nombre, PDO::PARAM_STR);
          $query->bindParam(2, $this->password, PDO::PARAM_STR);
          $query->bindParam(3, $this->matricula, PDO::PARAM_STR);
          $query->bindParam(4, $this->carrera, PDO::PARAM_STR);
          $query->bindParam(5, $this->idproyecto, PDO::PARAM_STR);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $e) {
    	        echo  $e->getMessage();
    	    }
    	}

        public function update(){
    		try{
    			$query = $this->con->prepare('UPDATE miembro SET nombre = ?, password = ?, matricula = ?, carrera = ?, idproyecto = ? WHERE id = ?');
          $query->bindParam(1, $this->nombre, PDO::PARAM_STR);
          $query->bindParam(2, $this->password, PDO::PARAM_STR);
          $query->bindParam(3, $this->matricula, PDO::PARAM_STR);
          $query->bindParam(4, $this->carrera, PDO::PARAM_STR);
          $query->bindParam(5, $this->idproyecto, PDO::PARAM_STR);
          $query->bindParam(6, $this->id, PDO::PARAM_INT);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $e){
    	        echo  $e->getMessage();
    	    }
    	}

    	//obtenemos usuarios de una tabla con postgreSql
    	public function get(){
    		try{
              if(is_int($this->id)){

              $query = $this->con->prepare('SELECT * FROM miembro WHERE id = ?');
              $query->bindParam(1, $this->id, PDO::PARAM_INT);
              $query->execute();
        			$this->con->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{

              $query = $this->con->prepare('SELECT * FROM miembro');
        			$query->execute();
        			$this->con->close();

        			return $query->fetchAll(PDO::FETCH_OBJ);
                }
    		}
            catch(PDOException $e){
    	        echo  $e->getMessage();
    	    }
    	}

        public function delete(){
            try{
                $query = $this->con->prepare('DELETE FROM miembro WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return true;
            }
            catch(PDOException $e){
                echo  $e->getMessage();
            }
        }

        public static function baseurl() {
             return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/usuario3/project/";
        }

        public function checkUser($user) {
            if( ! $user ) {
                header("Location:" . Usuario::baseurl() . "app/listUsuario.php");
            }
        }
    }
?>
