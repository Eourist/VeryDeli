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
		$publicaciones = new PublicacionModel();
		$publicaciones = $publicaciones->getAll();

		$dm 	= new DireccionModel();
		$cm 	= new CiudadModel();
		$pm 	= new ProvinciaModel();
		$um 	= new UsuarioModel();
		$com 	= new ComentarioModel();

		$this->view("header", "");
		$this->view("navbar", "");
		if (isset($publicaciones[0])){
			foreach ($publicaciones as $publicacion){
				$dir_o = $dm->getById($publicacion->id_direccion_origen);
				$dir_o = array(
					'calle' => $dir_o->calle,
					'numero' => $dir_o->numero,
					'piso' => $dir_o->piso,
					'depto' => $dir_o->depto,
					'descripcion' => $dir_o->descripcion, 
					'id_provincia' => $dir_o->id_provincia,
					'id_ciudad' => $dir_o->id_ciudad,
					'provincia' => $pm->getById($dir_o->id_provincia)->nombre,
					'ciudad' => $cm->getById($dir_o->id_ciudad)->nombre
				);

				$dir_d = $dm->getById($publicacion->id_direccion_destino);
				$dir_d = array(
					'calle' => $dir_d->calle,
					'numero' => $dir_d->numero,
					'piso' => $dir_d->piso,
					'depto' => $dir_d->depto,
					'descripcion' => $dir_d->descripcion, 
					'id_provincia' => $dir_d->id_provincia,
					'id_ciudad' => $dir_d->id_ciudad,
					'provincia' => $pm->getById($dir_d->id_provincia)->nombre,
					'ciudad' => $cm->getById($dir_d->id_ciudad)->nombre
				);

				// $comentarios = (array)$com->getByAsArray('id_publicacion', $publicacion->id);
				$comentarios = (array)$com->getComentariosPublicacion($publicacion->id);

				// echo '<pre>'; print_r($comentarios); exit();

				// tira error si la publicacion no tiene comentarios
				for ($i = 0; $i < count($comentarios); $i++){
					$usuario = $um->getById($comentarios[$i]['id_usuario']);
					$comentarios[$i]['usuario'] 		= $usuario->nombre;
					$comentarios[$i]['usuario_avatar'] 	= $usuario->avatar;
					if (!empty($comentarios[$i]['id_usuario_respuesta']))
						$comentarios[$i]['usuario_respuesta'] = $um->getById($comentarios[$i]['id_usuario_respuesta'])->nombre; 
				}
				//echo '<pre>'; print_r($comentarios); exit();

				$data = array(
					'publicacion' 		=> (array)$publicacion,
					'dir_o' 	=> $dir_o,
					'dir_d' => $dir_d,
					'usuario' => (array)($um->getById($publicacion->id_usuario)),
					'comentarios' => $comentarios
				);

				$this->view("publicacion", $data);
				$this->view("comentarios", $data);
			}
		} else {
				$this->view("errorBusqueda", "");
		}
		$this->view("footer", "");
	}


	public function comentar(){
		session_start();
		date_default_timezone_set("America/Argentina/Buenos_Aires");
		

		$cm = new ComentarioModel();

		$data = array(
			'id_publicacion' 		=> $_POST['fc_id_publicacion'],
			'id_usuario' 			=> $_POST['fc_id_usuario'],
			'id_usuario_respuesta'  => (isset($_POST['fc_id_usuario_respuesta'])) ? $_POST['fc_id_usuario_respuesta'] : NULL,
			'texto'					=> (isset($_POST['fc_id_usuario_respuesta'])) ? $_POST['fc_respuesta'] : $_POST['fc_comentario'],
			'fecha' => date("Y/m/d"),
			'hora' => date("H:i:s")
		);

		$alta = $cm->insert($data);

		if (!$alta)
			echo "Error: ".Conectar::$con->error;
		else
			$this->redirect("Publicacion", "inicio");
	}

	public function nuevaPublicacion(){
		$this->view("header", "");
		$this->view("navbar", "");
		$this->view("formPublicacion", "");
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