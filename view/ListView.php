<?php

class ListView 
{
	public function listOutput($users) {

          $html = '<!DOCTYPE html>
                    <html>
                    <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	                    <title>GervillaesPhoto Tablas</title>
	                    <link rel="stylesheet" type="text/css" href="view/librerias/bootstrap/css/bootstrap.css">
	                    <link rel="stylesheet" type="text/css" href="view/librerias/alertifyjs/css/alertify.css">
	                    <link rel="stylesheet" type="text/css" href="view/librerias/alertifyjs/css/themes/default.css">

	                    <script src="view/librerias/jquery-3.2.1.min.js"></script>
	                    <script src="view/librerias/bootstrap/js/bootstrap.js"></script>
	                    <script src="view/librerias/alertifyjs/alertify.js"></script>
                    </head>
                    <body>

	                    <div class="container">
		                    <div id="tabla"> 
		                         <div class="row">
		                                <div class="col-sm-12">
		                                <h2>Panel Administrador</h2>
			                                <table class="table table-hover table-condensed table-bordered">
			                                <caption>
				                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
					                                Agregar usuario 
					                                <span class="glyphicon glyphicon-plus"></span>
				                                </button>
			                                </caption>
				                                <tr>
					                                <td class="col-sm-2">Usuario</td>
					                                <td class="col-sm-2">Email</td>
					                                <td>Editar</td>
					                                <td>Eliminar</td>
				                                </tr>';
				                                	
				                                foreach ($users as $user) 
				                                {
					                      			$html .= '<tr>
						                                <td>'.$user->usuario.'</td>
						                                <td>'.$user->email.'</td>
						                                <td class="col-sm-1">
							                                <a href="/crud.php?action=editview&id='.$user->id.'"><button class="btn btn-warning glyphicon glyphicon-pencil"></button></a>
						                                </td>
						                                <td class="col-sm-1">
							                                <a href=""><button class="btn btn-danger glyphicon glyphicon-remove"><a href=""></a></button></a>
						                                </td>
					                                </tr>';
				                            	}

			                         $html .= '</table>
		                                </div>
		                            </div>
		             			</div>
		                    </div>
	                    </body>
	                </html>';

                return $html;
    }


    public function editOutput($user) {

         $html = '<!DOCTYPE html>
                    <html>
                    <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	                    <title>GervillaesPhoto Tablas</title>
	                    <link rel="stylesheet" type="text/css" href="view/librerias/bootstrap/css/bootstrap.css">
	                    <link rel="stylesheet" type="text/css" href="view/librerias/alertifyjs/css/alertify.css">
	                    <link rel="stylesheet" type="text/css" href="view/librerias/alertifyjs/css/themes/default.css">

	                    <script src="view/librerias/jquery-3.2.1.min.js"></script>
	                    <script src="view/librerias/bootstrap/js/bootstrap.js"></script>
	                    <script src="view/librerias/alertifyjs/alertify.js"></script>
                    </head>
                    <body>

	                    <div class="container">
		                	<form action="/crud.php" method="post">
							  <input type="hidden" name="id" value="'.$user->id.'"><br>
							  Usuario:<br>
							  <input type="text" name="usuario" value="'.$user->usuario.'"><br>
							  Email:<br>
							  <input type="text" name="email" value="'.$user->email.'">
							  <input type="submit" value="Submit">
							</form>    
		                </div>
	                    </body>
	                </html>';

        return $html;
    }
}


?>
