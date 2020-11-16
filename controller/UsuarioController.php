<?php
class UsuarioController extends ControladorBase{
    public $conectar;
		
    public function __construct() {
        parent::__construct();
    }

    public function index(){
    	// echo "USUARIO/INDEX";
        $this->view("header", "");
        $this->view("footer", "");
    }

    public function perfil(){
        session_start();
        $usuarioModel = new UsuarioModel();
        $direccionModel = new DireccionModel();
        $provinciaModel = new ProvinciaModel();
        $ciudadModel = new CiudadModel();
        //$envios = new EnvioModel();

        $usuario        = $usuarioModel->getById($_GET['id_usuario']);
        //$enviosTotales  = 10;//$envios->getBy('id_usuario', $usuario->id);
        //$solicitudes    = 2;//$envios->getSolicitudesUsuario($usuario->id);
        //$translados     = 3;//$envios->getTransladosUsuario($usuario->id);
        //$reputacion     = "Normal";//$envios->getReputacionUsuario($usuario->id);

        //$valTranslados  = "70%";
        //$valSolicitudes = "39%";

        $datos          = (array)$usuarioModel->getDatosEnvios($usuario->id);
        $publicaciones  = (array)$usuarioModel->getPublicaciones($usuario->id);
        $postulaciones  = (array)$usuarioModel->getPostulaciones($usuario->id);
        $solicitudes    = (array)$usuarioModel->getSolicitudes($usuario->id);
        $transportes    = (array)$usuarioModel->getTransportes($usuario->id);
        foreach ($publicaciones as $i => $value) {
            $dir_o = $direccionModel->getById($publicaciones[$i]['id_direccion_origen']);

            $publicaciones[$i]['provincia_origen'] = $provinciaModel->getById($dir_o->id_provincia)->nombre;
            $publicaciones[$i]['ciudad_origen'] = $ciudadModel->getById($dir_o->id_ciudad)->nombre;

            $dir_d = $direccionModel->getById($publicaciones[$i]['id_direccion_destino']);

            $publicaciones[$i]['provincia_destino'] = $provinciaModel->getById($dir_d->id_provincia)->nombre;
            $publicaciones[$i]['ciudad_destino'] = $ciudadModel->getById($dir_d->id_ciudad)->nombre;
        } 

        $datos['postulacion_activa'] = $usuarioModel->getPostulacionActiva($_SESSION['id'])['id'];

        $data = array(
            'usuario'                   => $usuario, 
            'solicitudes'               => $solicitudes, 
            'transportes'               => $transportes, 
            'publicaciones'             => $publicaciones,
            'postulaciones'             => $postulaciones,
            'datos'                     => $datos
        );
        //echo '<pre>'; print_r($data); exit();

		$this->view("header", "");
		$this->view("navbar", "");
        $this->view("perfilUsuario", $data);
        $this->view("publicaciones", $arrayName = array('datos' => $datos));
		$this->view("footer", "");

		// $u = new UsuarioModel();

        //   	$data = array(	'nombre' => 1,
        //   					'apellido' => 2,
        //   					'email' => 3,
        //   					'dni' => 1,
        //   					'contraseña' => 1 );
		// echo "<pre>";
		// print_r($u->insert($data));
    }

    public function cerrarSesion(){
    	session_start();
    	session_unset();

    	$_SESSION['alerta'] = "Cerrada la sesión";
    	$this->redirect('publicacion', 'index');
    }

    public function registrarse(){ // REEMPLAZAR VALIDACION POR AJAX??
		session_start();
    	$usuario = new UsuarioModel();

    	$usuario->setNombre		($_POST['fs_nombre']);
    	$usuario->setApellido	($_POST['fs_apellido']);
    	$usuario->setEmail		($_POST['fs_email']);
    	$usuario->setDNI 		($_POST['fs_dni']);
    	$usuario->setContraseña	(hash("sha256", $_POST["fs_contraseña"], false));
    	$usuario->setAvatar     ("av (".rand(1,48).")");

    	if ($usuario->getBy("email", $usuario->getEmail())){
    		// Error: Ya existe un usuario con ese email
    		$_SESSION['alerta'] = "Error: Ya existe un usuario con ese email";
    		$this->redirect("publicacion", "index");
    	} else if ($usuario->getBy("dni", $usuario->getDNI())){
    		// Error: Ya existe un usuario con ese DNI
    		$_SESSION['alerta'] = "Error: Ya existe un usuario con ese DNI";
    		$this->redirect("publicacion", "index");
    	} else {
	    	$alta = $usuario->alta();
	    	if ($alta){
		    	$_SESSION['id'] 		= Conectar::$con->insert_id;
		    	$_SESSION['nombre'] 	= $usuario->getNombre();
		    	$_SESSION['apellido'] 	= $usuario->getApellido();
		    	$_SESSION['email'] 		= $usuario->getEmail();
		    	$_SESSION['dni'] 		= $usuario->getDNI();
		    	$_SESSION['contraseña'] = $usuario->getContraseña();
		    	$_SESSION['avatar'] 	= $usuario->getAvatar();

		    	// Registro exitoso
    			$_SESSION['log'] = "Registro exitoso";
		    	$this->redirect("publicacion", "inicio");
	    	} else {
	    		// Error: Falló el registro
    			$_SESSION['alerta'] = "Error: Falló el registro - ".Conectar::$con->error;
	    	}
    	}
    }

    public function iniciarSesion(){ // REEMPLAZAR VALIDACION POR AJAX??
    	session_start();
    	$usuario = new UsuarioModel();

    	$usuario->setEmail		($_POST['fl_email']);
    	$usuario->setContraseña	(hash("sha256", $_POST["fl_contraseña"], false));

    	if($existente = $usuario->getBy("email", $usuario->getEmail())){
    		if ($existente[0]->contraseña == $usuario->getContraseña()){
    			$_SESSION['id'] 		= $existente[0]->id;
    			$_SESSION['nombre'] 	= $existente[0]->nombre;
    			$_SESSION['apellido'] 	= $existente[0]->apellido;
    			$_SESSION['email'] 		= $existente[0]->email;
    			$_SESSION['dni'] 		= $existente[0]->dni;
    			$_SESSION['contraseña'] = $existente[0]->contraseña;
		    	$_SESSION['avatar'] 	= $existente[0]->avatar;

    			// Sesion iniciada correctamente
    			$_SESSION['log'] = "Inicio de sesión exitoso";
    			$this->redirect("publicacion", "inicio");
    		} else {
    			//Error: Contraseña incorrecta
    			$_SESSION['alerta'] = "Error: Contraseña incorrecta";
    			$this->redirect("publicacion", "index");
    		}
    	} else {
    		// Error: Email incorrecto
    		$_SESSION['alerta'] = "Error: Email incorrecto";
    		$this->redirect("publicacion", "index");
    	}
    }

    public function cambiarAvatar(){
    	session_start();
    	$usuario = new UsuarioModel();

    	$usuario->setId 		($_SESSION['id']);
    	$usuario->setNombre		($_SESSION['nombre']);
    	$usuario->setApellido	($_SESSION['apellido']);
    	$usuario->setEmail		($_SESSION['email']);
    	$usuario->setDNI 		($_SESSION['dni']);
    	$usuario->setContraseña	($_SESSION["contraseña"]);

    	$usuario->setAvatar($_POST['f_avatar']);

    	$modificacion = $usuario->modificacion();
    	if ($modificacion){
    		$_SESSION['avatar'] = $usuario->getAvatar();
	    	// Cambio de avatar exitoso
	    	$_SESSION['log'] = "Cambio de avatar exitoso";
	    	$this->redirect("usuario", "perfil", '&id_usuario='.$_SESSION['id']);
    	} else {
            // Error: No se pudo cambiar el avatar
            $_SESSION['alerta'] = "Error: No se pudo cambiar el avatar - ".Conectar::$con->error;
            $this->redirect("usuario", "perfil", '&id_usuario='.$_SESSION['id']);
    	}
    }

    public function crearVehiculo(){
		session_start();
    	$vehiculo = new VehiculoModel();

    	$vehiculo->setIdUsuario	($_SESSION['id']);
    	$vehiculo->setPatente	($_POST['fv_patente']);
    	$vehiculo->setTipo		($_POST['fv_tipo']);
    	$vehiculo->setMarca		($_POST['fv_marca']);
    	$vehiculo->setModelo	($_POST['fv_modelo']);

    	// EJEMPLO DE ALTA USANDO EntidadBase->insert
    	$data = array(
    		'id_usuario' 	=> $_SESSION['id'], 
    		'tipo' 			=> $_POST['fv_tipo'], 
    		'patente' 		=> $_POST['fv_patente'], 
    		'marca' 		=> $_POST['fv_marca'], 
    		'modelo' 		=> $_POST['fv_modelo'], 
    	);

		if (sizeof($vehiculo->getBy("id_usuario", $_SESSION['id'])) > 4){
	    	// Error: El usuario ya tiene demasiados vehiculos
    		$_SESSION['alerta'] = "Error: El usuario ya tiene demasiados vehiculos";
    		$this->redirect('usuario', 'perfil', '&id_usuario='.$_SESSION['id']);
    	} else if ($vehiculo->getBy("patente", $vehiculo->getPatente())){
    		// Error: Ya existe un vehiculo con esa patente
    		$_SESSION['alerta'] = "Error: Ya existe un vehiculo con esa patente";
    		$this->redirect('usuario', 'perfil', '&id_usuario='.$_SESSION['id']);
    	} else {
    		//$alta = $vehiculo->alta();
    		$alta = $vehiculo->insert($data); // EJEMPLO DE ALTA USANDO EntidadBase->insert
    		if ($alta){
    			// Alta exitosa
    			$_SESSION['log'] = "Alta de vehiculo exitosa";
    			$this->redirect('usuario', 'perfil', '&id_usuario='.$_SESSION['id']);
    		} else {
	    		// Error: No se pudo crear el vehiculo
    			$_SESSION['alerta'] = "Error: No se pudo crear el vehiculo - ".Conectar::$con->error;
    			$this->redirect('usuario', 'perfil', '&id_usuario='.$_SESSION['id']);
	    	}
    	}
    }

    public function eliminarVehiculo(){
    	session_start();
    	$vehiculo = new VehiculoModel();

    	$id_vehiculo = $_POST['id_vehiculo'];
    	$existente = $vehiculo->getById($id_vehiculo);

    	if ($existente->id_usuario == $_SESSION['id']){
    		$baja = $vehiculo->deleteById($id_vehiculo);

    		if ($baja){
	    		// Eliminación exitosa
    			$_SESSION['log'] = "Eliminación de vehiculo exitosa";
    			$this->redirect('usuario', 'perfil', '&id_usuario='.$_SESSION['id']);
    		} else {
		    	// Error: No se pudo eliminar el vehiculo
    			$_SESSION['alerta'] = "Error: No se pudo eliminar el vehiculo - ".Conectar::$con->error;
    			$this->redirect('usuario', 'perfil', '&id_usuario='.$_SESSION['id']);
    		}
    	} else {
	    	// Error: Falló la eliminación del vehiculo porque no pertenece al usuario logueado
    		$_SESSION['alerta'] = "Error: Falló la eliminación del vehiculo porque no pertenece al usuario logueado";
    		$this->redirect('usuario', 'perfil', '&id_usuario='.$_SESSION['id']);
    	}
    }

    public function pruebaAjax(){
    	$data = $_POST['data'];

		echo json_encode("Datos: ".$data);
    }

		//Listar todos los Usuarios	
		/*public function index(){
			
			//Creamos el objeto usuario
			$usuario=new Usuario();

			//Conseguimos todos los usuarios
			$allusers=$usuario->getAll();

		   //Cargamos la vista index y le pasamos valores
			$this->view("index",array(
				"allusers"=>$allusers,
				"UnaVariableDeLaVista"    =>"Valor de la Vista"
			));
		}

		//Muestra el formulario de inserción
		public function insertar(){
        
			//Conseguimos todos los usuarios
			$provincia=new Provincia();
			$allProvincias= $provincia->getAll();
			
			//Cargamos la vista para mostrar formulario de insert
			$this->view("insertar",array(
				"allProvincias"=>$allProvincias
			));
		
		}

		//Procesa los datos del formulario de inserción
		public function crear(){
			if(isset($_POST["nombre"])){
            
				//Creamos un usuario
				$usuario=new Usuario();
				$usuario->setNombre($_POST["nombre"]);
				$usuario->setApellido($_POST["apellido"]);
				$usuario->setEmail($_POST["email"]);
				
				//al constructor de provincia le paso el id
				$provincia = new Provincia();
				$provincia->setId($_POST["provincia"]);
				$usuario->setProvincia($provincia);
				
				$usuario->setPassword($_POST["password"]);
				$save=$usuario->save();
			}
			$this->redirect("Usuario", "index");
		}

		//Procesa el borrado de unUsuario
		public function borrar(){
			if(isset($_GET["id"])){ 
				$id=(int)$_GET["id"];
				
				$usuario=new Usuario();
				$usuario->deleteById($id); 
			}
			$this->redirect();
		}
   
     
		//Muestra el formulario de Actualizacion
		public function editar(){
			if(isset($_GET["id"])){ 
				$id=(int)$_GET["id"];
				//Conseguimos todos los usuarios
				$provincia=new Provincia();
				$allProvincias= $provincia->getAll();
				//traemos todos los datos del usuario para mostrarlos en el formulario
				$usuario = new Usuario();
				$usuario = $usuario->getById($id);
				//Cargamos la vista para mostrar formulario de insert
				$this->view("editar",array(
					"allProvincias"=>$allProvincias,
					"usuario"=>$usuario
				));
			}
		}	 
		//Procesa los datos del formulario de edición
		public function actualizar(){
			if(isset($_POST["nombre"])){
            
				//Creamos un usuario
				$usuario=new Usuario();
				$usuario->setId($_POST["id"]);
				$usuario->setNombre($_POST["nombre"]);
				$usuario->setApellido($_POST["apellido"]);
				$usuario->setEmail($_POST["email"]);
				
				//al constructor de provincia le paso el id
				$provincia = new Provincia();
				$provincia->setId($_POST["provincia"]);
				$usuario->setProvincia($provincia);

				$save=$usuario->save();
			}
			$this->redirect("Usuario", "index");
		}*/

    

}
?>
