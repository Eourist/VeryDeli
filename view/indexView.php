<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        
        <div class="col-lg-7">
         <h3 style="display:inline">Usuarios</h3>
		<span>
          <a href="<?php echo $helper->url("usuario","insertar"); ?>" class="btn btn-info">Agregar Nuevo Usuario</a>
        </span>

            <hr/>
        </div>
        <section class="col-lg-7 usuario">
            <?php foreach($allusers as $user) {?>
                <?php echo $user->id; ?> -
                <?php echo $user->nombre; ?> -
                <?php echo $user->apellido; ?> -
                <?php echo $user->email; ?>
                <div class="right">
                    <a href="<?php echo $helper->url("usuario","borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
					<a href="<?php echo $helper->url("usuario","editar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-info">Actualizar</a>
                </div>
                <hr/>
            <?php } ?>
	
        </section>
		
        <footer class="col-lg-12">
            <hr/>
        </footer>
    </body>
</html>