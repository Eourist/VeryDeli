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
		if(isset($_POST["nombre"])){
			$usuario = new UsuarioModel();
			$usuario->setNombre($_POST["nombre"]);
			$usuario->setApellido('test');//$_POST["apellido"]);
			$usuario->setEmail('test');//$_POST["email"]);
			$usuario->setDNI(80000000);//$_POST["dni"]);
			$usuario->setContraseña($_POST["contraseña"]);

			$save = $usuario->save();
		}
		$this->redirect("Publicacion", "index");
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