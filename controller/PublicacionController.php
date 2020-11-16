<?php class PublicacionController extends ControladorBase{
	public $conectar;

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$this->view("header", "");
		$this->view("inicio", "");
		// $this->view("footer", "");
	}

	public function inicio(){
		session_start();
		$publicaciones = new PublicacionModel();
		$publicaciones = $publicaciones->getAll();

		$direccionModel 	= new DireccionModel();
		$ciudadModel 		= new CiudadModel();
		$provinciaModel 	= new ProvinciaModel();
		$comentarioModel 	= new ComentarioModel();

		$usuarioModel 	= new UsuarioModel();
		$vehiculoModel 	= new VehiculoModel();

		$postulacionModel = new PostulacionModel();

		$datosUsuario = $usuarioModel->getDatosEnvios($_SESSION['id']);
		$datosUsuario['postulacion_activa'] = $usuarioModel->getPostulacionActiva($_SESSION['id'])['id'];

		// $dataUsuario = array(
		// 	'datos' 					=> $datosUsuario,
		// 	'publicaciones_disponibles' => $usuarioModel->getPublicacionesDisponibles($_SESSION['id'], $datosUsuario['reputacion'])['nro'],
		// 	'postulacion_activa'		=> $usuarioModel->getPostulacionActiva($_SESSION['id'])
		// );

		$_SESSION['vehiculos'] = $vehiculoModel->getByAsArray('id_usuario', $_SESSION['id']);
		// $data['vehiculos'] = $vehiculoModel->getByAsArray('id_usuario', $_SESSION['id']);
		//echo '<pre>';print_r($data); exit();

		$this->view("header", "");
		$this->view("navbar", "");
		$this->view("publicaciones", $datosUsuario);
		if (isset($publicaciones[0])){
			foreach ($publicaciones as $publicacion){
				$dir_o = $direccionModel->getById($publicacion->id_direccion_origen);
				$dir_o = array(
					'calle' 		=> $dir_o->calle,
					'numero'	 	=> $dir_o->numero,
					'piso' 			=> $dir_o->piso,
					'depto' 		=> $dir_o->depto,
					'descripcion' 	=> $dir_o->descripcion, 
					'id_provincia' 	=> $dir_o->id_provincia,
					'id_ciudad' 	=> $dir_o->id_ciudad,
					'provincia' 	=> $provinciaModel->getById($dir_o->id_provincia)->nombre,
					'ciudad' 		=> $ciudadModel->getById($dir_o->id_ciudad)->nombre
				);

				$dir_d = $direccionModel->getById($publicacion->id_direccion_destino);
				$dir_d = array(
					'calle' 		=> $dir_d->calle,
					'numero' 		=> $dir_d->numero,
					'piso' 			=> $dir_d->piso,
					'depto' 		=> $dir_d->depto,
					'descripcion' 	=> $dir_d->descripcion, 
					'id_provincia' 	=> $dir_d->id_provincia,
					'id_ciudad' 	=> $dir_d->id_ciudad,
					'provincia' 	=> $provinciaModel->getById($dir_d->id_provincia)->nombre,
					'ciudad' 		=> $ciudadModel->getById($dir_d->id_ciudad)->nombre
				);

				// $comentarios = (array)$comentarioModel->getByAsArray('id_publicacion', $publicacion->id);
				$comentarios = (array)$comentarioModel->getComentariosPublicacion($publicacion->id);

				// echo '<pre>'; print_r($comentarios); exit();

				for ($i = 0; $i < count($comentarios); $i++){
					$usuario = $usuarioModel->getById($comentarios[$i]['id_usuario']);
					$comentarios[$i]['usuario'] 		= $usuario->nombre;
					$comentarios[$i]['usuario_avatar'] 	= $usuario->avatar;
					if (!empty($comentarios[$i]['id_usuario_respuesta']))
						$comentarios[$i]['usuario_respuesta'] = $usuarioModel->getById($comentarios[$i]['id_usuario_respuesta'])->nombre; 
				}
				//echo '<pre>'; print_r($comentarios); exit();

				// $postulantes = $postulacionModel->getByAsArray('id_publicacion', $publicacion->id);

				$data = array(
					'publicacion' 		=> (array)$publicacion,
					'dir_o' 			=> $dir_o,
					'dir_d' 			=> $dir_d,
					'usuario' 			=> (array)($usuarioModel->getById($publicacion->id_usuario)),
					'comentarios' 		=> $comentarios
					// 'postulantes'		=> $postulantes
				);

				$this->view("publicacion", $data);
				// $this->view("comentarios", $data);
			}
		} else {
				$this->view("errorBusqueda", "");
		}
		$this->view("footer", "");
	}

	public function buscar(){
		session_start();
		$publicaciones 		= new PublicacionModel();
		$direccionModel 	= new DireccionModel();
		$ciudadModel 		= new CiudadModel();
		$provinciaModel 	= new ProvinciaModel();
		$comentarioModel 	= new ComentarioModel();
		$usuarioModel 		= new UsuarioModel();
		$vehiculoModel 		= new VehiculoModel();
		$postulacionModel 	= new PostulacionModel();
		// echo $_POST['fb_tipo_vehiculo']; exit();

		$where = "WHERE publicacion.estado = 0";
		$where .= (!empty($_POST['fb_titulo'])) 		? " AND publicacion.titulo LIKE '%"			.$_POST['fb_titulo']."%'" 		: "";
		$where .= (!empty($_POST['fb_fecha_salida'])) 	? " AND publicacion.fecha_salida = DATE('"		.$_POST['fb_fecha_salida']."')" 	: "";
		$where .= ($_POST['fb_tipo_vehiculo']!="") 		? " AND publicacion.tipo_vehiculo = '"	.$_POST['fb_tipo_vehiculo']."'" : "";
		$where .= ($_POST['fb_id_provincia']!=0) 		? " AND ubi.id_provincia = "	.$_POST['fb_id_provincia']	 	: "";
		$where .= ($_POST['fb_id_ciudad']!=0) 			? " AND ubi.id_ciudad = "	.$_POST['fb_id_ciudad']			: "";
		//$where = substr($where, 0, -2);
		// echo $where; exit();
		$publicaciones = $publicaciones->getPublicacionesFiltro($where);
		$_SESSION['vehiculos'] = $vehiculoModel->getByAsArray('id_usuario', $_SESSION['id']);
		// $data['vehiculos'] = $vehiculoModel->getByAsArray('id_usuario', $_SESSION['id']);
		//echo '<pre>';print_r($data); exit();

		$this->view("header", "");
		$this->view("navbar", "");
		$this->view("buscarPublicaciones", "");
		$this->view("publicaciones", "");
		if (isset($publicaciones[0])){
			foreach ($publicaciones as $publicacion){
				$dir_o = $direccionModel->getById($publicacion->id_direccion_origen);
				$dir_o = array(
					'calle' 		=> $dir_o->calle,
					'numero'	 	=> $dir_o->numero,
					'piso' 			=> $dir_o->piso,
					'depto' 		=> $dir_o->depto,
					'descripcion' 	=> $dir_o->descripcion, 
					'id_provincia' 	=> $dir_o->id_provincia,
					'id_ciudad' 	=> $dir_o->id_ciudad,
					'provincia' 	=> $provinciaModel->getById($dir_o->id_provincia)->nombre,
					'ciudad' 		=> $ciudadModel->getById($dir_o->id_ciudad)->nombre
				);

				$dir_d = $direccionModel->getById($publicacion->id_direccion_destino);
				$dir_d = array(
					'calle' 		=> $dir_d->calle,
					'numero' 		=> $dir_d->numero,
					'piso' 			=> $dir_d->piso,
					'depto' 		=> $dir_d->depto,
					'descripcion' 	=> $dir_d->descripcion, 
					'id_provincia' 	=> $dir_d->id_provincia,
					'id_ciudad' 	=> $dir_d->id_ciudad,
					'provincia' 	=> $provinciaModel->getById($dir_d->id_provincia)->nombre,
					'ciudad' 		=> $ciudadModel->getById($dir_d->id_ciudad)->nombre
				);

				// $comentarios = (array)$comentarioModel->getByAsArray('id_publicacion', $publicacion->id);
				$comentarios = (array)$comentarioModel->getComentariosPublicacion($publicacion->id);

				// echo '<pre>'; print_r($comentarios); exit();

				for ($i = 0; $i < count($comentarios); $i++){
					$usuario = $usuarioModel->getById($comentarios[$i]['id_usuario']);
					$comentarios[$i]['usuario'] 		= $usuario->nombre;
					$comentarios[$i]['usuario_avatar'] 	= $usuario->avatar;
					if (!empty($comentarios[$i]['id_usuario_respuesta']))
						$comentarios[$i]['usuario_respuesta'] = $usuarioModel->getById($comentarios[$i]['id_usuario_respuesta'])->nombre; 
				}
				//echo '<pre>'; print_r($comentarios); exit();

				// $postulantes = $postulacionModel->getByAsArray('id_publicacion', $publicacion->id);

				$data = array(
					'publicacion' 		=> (array)$publicacion,
					'dir_o' 			=> $dir_o,
					'dir_d' 			=> $dir_d,
					'usuario' 			=> (array)($usuarioModel->getById($publicacion->id_usuario)),
					'comentarios' 		=> $comentarios
					// 'postulantes'		=> $postulantes
				);

				$this->view("publicacion", $data);
				// $this->view("comentarios", $data);
			}
		} else {
				$this->view("errorBusqueda", "");
		}
		$this->view("footer", "");
	}

	public function publicacion(){
		session_start();
		$publicacion = new PublicacionModel();
		$publicacion = $publicacion->getById($_GET['id_publicacion']);

		$direccionModel 	= new DireccionModel();
		$ciudadModel 		= new CiudadModel();
		$provinciaModel 	= new ProvinciaModel();
		$comentarioModel 	= new ComentarioModel();

		$usuarioModel 	= new UsuarioModel();
		$vehiculoModel 	= new VehiculoModel();

		$postulacionModel = new PostulacionModel();

		$datosUsuario = $usuarioModel->getDatosEnvios($_SESSION['id']);
		$datosUsuario['postulacion_activa'] = $usuarioModel->getPostulacionActiva($_SESSION['id'])['id'];

		$_SESSION['vehiculos'] = $vehiculoModel->getByAsArray('id_usuario', $_SESSION['id']);
		// $data['vehiculos'] = $vehiculoModel->getByAsArray('id_usuario', $_SESSION['id']);
		//echo '<pre>';print_r($data); exit();

		$this->view("header", "");
		$this->view("navbar", "");
		$this->view("publicaciones", $datosUsuario);
		$dir_o = $direccionModel->getById($publicacion->id_direccion_origen);
		$dir_o = array(
			'calle' 		=> $dir_o->calle,
			'numero'	 	=> $dir_o->numero,
			'piso' 			=> $dir_o->piso,
			'depto' 		=> $dir_o->depto,
			'descripcion' 	=> $dir_o->descripcion, 
			'id_provincia' 	=> $dir_o->id_provincia,
			'id_ciudad' 	=> $dir_o->id_ciudad,
			'provincia' 	=> $provinciaModel->getById($dir_o->id_provincia)->nombre,
			'ciudad' 		=> $ciudadModel->getById($dir_o->id_ciudad)->nombre
		);

		$dir_d = $direccionModel->getById($publicacion->id_direccion_destino);
		$dir_d = array(
			'calle' 		=> $dir_d->calle,
			'numero' 		=> $dir_d->numero,
			'piso' 			=> $dir_d->piso,
			'depto' 		=> $dir_d->depto,
			'descripcion' 	=> $dir_d->descripcion, 
			'id_provincia' 	=> $dir_d->id_provincia,
			'id_ciudad' 	=> $dir_d->id_ciudad,
			'provincia' 	=> $provinciaModel->getById($dir_d->id_provincia)->nombre,
			'ciudad' 		=> $ciudadModel->getById($dir_d->id_ciudad)->nombre
		);

				// $comentarios = (array)$comentarioModel->getByAsArray('id_publicacion', $publicacion->id);
		$comentarios = (array)$comentarioModel->getComentariosPublicacion($publicacion->id);

				// echo '<pre>'; print_r($comentarios); exit();

		for ($i = 0; $i < count($comentarios); $i++){
			$usuario = $usuarioModel->getById($comentarios[$i]['id_usuario']);
			$comentarios[$i]['usuario'] 		= $usuario->nombre;
			$comentarios[$i]['usuario_avatar'] 	= $usuario->avatar;
			if (!empty($comentarios[$i]['id_usuario_respuesta']))
				$comentarios[$i]['usuario_respuesta'] = $usuarioModel->getById($comentarios[$i]['id_usuario_respuesta'])->nombre; 
		}
				//echo '<pre>'; print_r($comentarios); exit();

				// $postulantes = $postulacionModel->getByAsArray('id_publicacion', $publicacion->id);

		$data = array(
			'publicacion' 		=> (array)$publicacion,
			'dir_o' 			=> $dir_o,
			'dir_d' 			=> $dir_d,
			'usuario' 			=> (array)($usuarioModel->getById($publicacion->id_usuario)),
			'comentarios' 		=> $comentarios
					// 'postulantes'		=> $postulantes
		);

		$this->view("publicacion", $data);
		$this->view("footer", "");
	}

	public function confirmarEnvio(){
		session_start();
		$envioModel = new EnvioModel();


		$id_envio 	= $_POST['fce_id_envio'];
		$calificacion = $_POST['fce_valoracion'];
		$comentario = !empty($_POST['fce_comentario']) ? $_POST['fce_comentario'] : "Sin comentario.";

		$existente = $envioModel->getByIdAsArray($id_envio);

		$data = array();
		if ($_POST['fce_confirmacion_responsable'] == 1 && $_POST['fce_confirmacion_solicitante'] == 0){
			$data = array(
				'confirmacion_responsable' 	=> $_POST['fce_confirmacion_responsable'],
				'calificacion_responsable' 	=> $calificacion,
				'comentario_responsable' 	=> $comentario
			);
			if ($existente['confirmacion_solicitante'] == 1){
				$data['fecha'] = date("Y-m-d");
				$data['hora']  = date("h:i:sa");
			}
		} else if ($_POST['fce_confirmacion_responsable'] == 0 && $_POST['fce_confirmacion_solicitante'] == 1){
			$data = array(
				'confirmacion_solicitante' 	=> $_POST['fce_confirmacion_solicitante'],
				'calificacion_solicitante' 	=> $calificacion,
				'comentario_solicitante' 	=> $comentario
			);
			if ($existente['confirmacion_responsable'] == 1){
				$data['fecha'] = date("Y-m-d");
				$data['hora']  = date("h:i:sa");
			}
		}

		$envioModel->modificacion($id_envio, $data);
		$this->redirect('usuario','perfil','&id_usuario='.$_SESSION['id']);
	}

	public function comentar(){
		session_start();
		date_default_timezone_set("America/Argentina/Buenos_Aires");

		$cm = new ComentarioModel();

		$data = array(
			'id_publicacion' 		=> $_POST['fc_id_publicacion'],
			'id_usuario' 			=> $_POST['fc_id_usuario'],
			'id_usuario_respuesta'  => (isset($_POST['fc_id_usuario_respuesta'])) ? $_POST['fc_id_usuario_respuesta'] : NULL,
			'texto'					=> (isset($_POST['fc_id_usuario_respuesta'])) ? $_POST['fc_respuesta'] : $_POST['fc_comentario']/*,
			'fecha' => date("Y/m/d"),
			'hora' => date("H:i:s")*/
		);

		$alta = $cm->insert($data);

		if (!$alta)
			echo "Error: ".Conectar::$con->error;
		else
			$this->redirect("Publicacion", "publicacion", "&id_publicacion=".$_POST['fc_id_publicacion']);
	}

	public function postularse(){ // VERIFICAR QUE YA NO EXISTA UNA POSTULACION DE ESE USUARIO EN ESA PUBLICACION (EDITAR SI YA EXISTE??)
		session_start();
		$pm = new PostulacionModel();

		$data = array(
			'id_usuario' 		=> $_SESSION['id'],
			'id_publicacion' 	=> $_POST['fp_id_publicacion'],
			'id_vehiculo'  		=> $_POST['fp_id_vehiculo'],
			'precio'			=> $_POST['fp_precio']
		);

		if ($existente = $pm->getPostulacionUsuarioPublicacion($_SESSION['id'], $_POST['fp_id_publicacion'])){
			$data['id'] = $existente['id'];
			$modificacion = $pm->modificacion($existente['id'], $data);

			if (!$modificacion)
				echo "Error: ".Conectar::$con->error;
			else
				$this->redirect("Publicacion", "publicacion", "&id_publicacion=".$_POST['fp_id_publicacion']);
		} else {
			$alta = $pm->insert($data);

			if (!$alta)
				echo "Error: ".Conectar::$con->error;
			else
				$this->redirect("Publicacion", "publicacion", "&id_publicacion=".$_POST['fp_id_publicacion']);
		}
	}

		// public function comentar(){ PROBANDO SI  VALE LA PENA CON AJAX O NO
			// 	session_start();
			// 	date_default_timezone_set("America/Argentina/Buenos_Aires");
				

			// 	$cm = new ComentarioModel();
			// 	// $usuarioModel = new UsuarioModel();

			// 	$data = array(
			// 		'id_publicacion' 		=> $_POST['fc_id_publicacion'],
			// 		'id_usuario' 			=> $_POST['fc_id_usuario'],
			// 		'id_usuario_respuesta'  => (isset($_POST['fc_id_usuario_respuesta'])) ? $_POST['fc_id_usuario_respuesta'] : NULL,
			// 		'texto'					=> $_POST['fc_texto'],
			// 		'fecha' => date("Y/m/d"),
			// 		'hora' => date("H:i:s")
			// 	);

			// 	$alta = $cm->insert($data);

			// 	// $usuario = $usuarioModel->getById($_POST['fc_id_usuario']);
			// 	// $data['usuario_avatar'] = $usuario->avatar;
			// 	// $data['usuario'] = $usuario->nombre;
			// 	// $data['id'] = Conectar::$con->insert_id;

			// 	if (!$alta)
			// 		echo "Error: ".Conectar::$con->error;
			// 	else
			// 		$this->redirect('publicacion', 'inicio');
			// 	// if(!$alta)
			// 	// 	echo json_encode("Error: ".Conectar::$con->error);
			// 	// else
			// 	// 	echo json_encode($data);
		// }

	public function nuevaPublicacion(){
		session_start();

		$usuarioModel = new UsuarioModel();
		$datosUsuario = $usuarioModel->getDatosEnvios($_SESSION['id']);
		$datosUsuario['publicaciones_disponibles'] = $usuarioModel->getPublicacionesDisponibles($_SESSION['id'], $datosUsuario['reputacion'])['nro'];

		$this->view("header", "");
		$this->view("navbar", "");
		$this->view("formPublicacion", $datosUsuario);
		$this->view("footer", "");
	}

	public function buscarPublicaciones(){
		$this->view("header", "");
		$this->view("navbar", "");
		$this->view("buscarPublicaciones", "");
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
			$this->redirect("Publicacion", "publicacion", "&id_publicacion=".Conectar::$con->insert_id);
		else
			echo "Error: ".Conectar::$con->error;
	}

	public function confirmarPostulante(){
		$envioModel = new EnvioModel();
		$publicacionModel = new PublicacionModel();
		$postulacionModel = new PostulacionModel();

		$envioModel->setIdPostulacion($_POST['fcp_id_postulacion']);
		$alta = $envioModel->alta();

		$publicacionModel->cambiarEstado($postulacionModel->getById($envioModel->getIdPostulacion())->id_publicacion, 1);
		$postulacionModel->cambiarEstado($postulacionModel->getById($envioModel->getIdPostulacion())->id, 1);

		if ($alta){
			// Confirmacion exitosa
			$_SESSION['log'] = "Confirmado el envio";
			$this->redirect("Publicacion", "publicacion", "&id_publicacion=".$postulacionModel->getById($envioModel->getIdPostulacion())->id_publicacion);
		} else {
	    	// Error: Falló la confirmación
			$_SESSION['alerta'] = "Error: Falló la confirmación - ".Conectar::$con->error;
		}
	}

	public function eliminarPostulacion(){
		session_start();
		$postulacionModel = new PostulacionModel();
		$id = $_POST['fe_id_postulacion'];

		$postulacionModel->cambiarEstado($id, 2);

		$this->redirect('usuario', 'perfil', "&id_usuario=".$_SESSION['id']);
	}

	public function eliminarPublicacion(){
		session_start();
		$publicacionModel = new PublicacionModel();
		$id = $_POST['fe_id_publicacion'];

		$publicacionModel->cambiarEstado($id, 2);

		$this->redirect('usuario', 'perfil', "&id_usuario=".$_SESSION['id']);
	}

	// Funciones llamadas por AJAX
		public function getCiudades(){
			$id_provincia = $_POST['id_provincia'];
			$ciudad = new CiudadModel();
			$ciudad = $ciudad->getBy('id_provincia', $id_provincia);

			echo json_encode($ciudad);
		}

		public function getDatosPostulantesPublicacion(){
			$id_publicacion = $_POST['id_publicacion'];

			$postulantes = new PostulacionModel();
			$postulantes = $postulantes->getDatosPostulantesPublicacion($id_publicacion);

			echo json_encode($postulantes);
		}

		public function getPostulantesPublicacion(){
			$id_publicacion = $_POST['id_publicacion'];

			$postulacionModel = new PostulacionModel();
			$data['postulantes'] = (array)$postulacionModel->getPostulantesPostulacion($id_publicacion);
			$data['datos'] = (array)$postulacionModel->getDatosPostulantesPublicacion($id_publicacion);

			echo json_encode($data);
		}
	// Fin funciones llamadas por AJAX
} ?>