<?php class PublicacionController extends ControladorBase{
	public $conectar;

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$this->view("header", "");
		$this->view("inicio", "");
		$this->view("footer", "");
	}

	public function inicio(){
		$this->view("header", "");
		$this->view("navbar", "");
		$this->view("formPublicacion", "");
		$this->view("publicacion", "");
		$this->view("footer", "");
	}

	public function crear(){
		session_start();
		$publicacion = new PublicacionModel();

		$dir = new DireccionModel();
		// Ubicacion de origen
		$data_dir_origen = array(
			'id_provincia' 	=> $_POST['fdo_provincia'],
			'id_ciudad' 	=> $_POST['fdo_ciudad'], 
			'calle' 		=> $_POST['fdo_calle'], 
			'numero' 		=> $_POST['fdo_numero'], 
			'piso' 			=> $_POST['fdo_piso'], 
			'depto' 		=> $_POST['fdo_depto'], 
			'descripcion' 	=> $_POST['fdo_descripcion']
		);

		// Ubicacion de destino
		$data_dir_destino = array(
			'id_provincia' 	=> $_POST['fdd_provincia'],
			'id_ciudad' 	=> $_POST['fdd_ciudad'], 
			'calle' 		=> $_POST['fdd_calle'], 
			'numero' 		=> $_POST['fdd_numero'], 
			'piso' 			=> $_POST['fdd_piso'], 
			'depto' 		=> $_POST['fdd_depto'], 
			'descripcion' 	=> $_POST['fdd_descripcion']
		);

		$alta_origen = $dir->insert($data_dir_origen);
		$id_origen = Conectar::$con->insert_id;
		$alta_destino = $dir->insert($data_dir_destino);
		$id_destino = Conectar::$con->insert_id;

		
		$publicacion->setIdUsuario($_SESSION['id']);
		$publicacion->setIdDireccionOrigen($id_origen);
		$publicacion->setIdDireccionDestino($id_destino);

		$publicacion->setTipoVehiculo		($_POST['fp_tipo_vehiculo']);
		$publicacion->setTitulo				($_POST['fp_titulo']);
		$publicacion->setFechaSalida		($_POST['fp_fecha_salida']);//date("Y-m-d"));
		$publicacion->setHoraSalida			($_POST['fp_hora_salida']);//date("h:i:sa"));
		$publicacion->setPeso 				($_POST['fp_medida_peso']);
		$publicacion->setMedidaAlto			($_POST['fp_medida_alto']);
		$publicacion->setMedidaLargo		($_POST['fp_medida_largo']);
		$publicacion->setMedidaAncho		($_POST['fp_medida_ancho']);
		$publicacion->setDescripcion		($_POST['fp_descripcion']);

		$data = array(
			'id_usuario' 			=> $publicacion->getIdUsuario(), 
			'id_direccion_origen' 	=> $publicacion->getIdDireccionOrigen(), 
			'id_direccion_destino' 	=> $publicacion->getIdDireccionDestino(), 
			'tipo_vehiculo' 		=> $publicacion->getTipoVehiculo(), 
			'titulo' 				=> $publicacion->getTitulo(), 
			'fecha_salida' 			=> $publicacion->getFechaSalida(), 
			'hora_salida' 			=> $publicacion->getHoraSalida(), 
			'peso' 					=> $publicacion->getPeso(), 
			'medida_alto' 			=> $publicacion->getMedidaAlto(), 
			'medida_largo' 			=> $publicacion->getMedidaLargo(), 
			'medida_ancho' 			=> $publicacion->getMedidaAncho(), 
			'descripcion' 			=> $publicacion->getDescripcion()
		);

		$alta = $publicacion->insert($data);

		if ($alta)
			echo "Alta exitosa ".Conectar::$con->error;
		else
			echo "Error: ".Conectar::$con->error;
	}

	public function getCiudades(){
		$id_provincia = $_POST['id_provincia'];
		$ciudad = new CiudadModel();
		$ciudad = $ciudad->getBy('id_provincia', $id_provincia);

		echo json_encode($ciudad);
	}

	public function borrarTodos(){
		$u = new UsuarioModel();
		$u->borrarTodos();
		$this->redirect("Publicacion", "index");
	}

	public function cambioVista(){
		$this->view("prueba2", "");
	}
} ?>