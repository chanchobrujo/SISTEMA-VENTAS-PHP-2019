<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<style type="text/css">
		body{
		    font-family: monospace;
		    text-decoration: none;
		    letter-spacing: 2.5px;
	    	color: white;
	    	background-color: #080A1E;
		}
		.btn{
			border: 1px solid #121C63;
			transition: .5s;
			border-style: none;
			background-color: white;
			color: black;
			padding: 5px 5px 5px 5px;
			cursor: pointer;
			margin: 10px;
		}
		.btn:hover{
			padding: 5px 10px 5px 10px;
		}
		.flex{
			height: 100%;
			display: flex;
			align-items: center;
		}
		.modal{
			display: none;
			position: fixed;
			z-index: 1;
			overflow: auto;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0,0,0,0.5);
		}
		.contenido-modal{
			position: relative;
			margin: auto;
			width: 30%;
			animation-name: modal;
			animation-duration: .5s;
			border: 1px solid white;
		}
		@keyframes modal{
			from{
				top: -330px;
				opacity: 0;
			}
			to{
				top: 0;
				opacity: 1;
			}
		}
		#close{
			margin-left: 70%;
			transition: .5s;
			color: white;
			font-size: 30px;
			text-decoration: none;
			cursor: pointer;
		}
		.modal-header{
			padding: 8px 16px;
			color: white;
			font-weight: bold;
			text-align: center;
			border-bottom: 1px solid white;
			background: #080A1E;
		}
		.modal-body{
			padding: 20px 16px;
			background: #121C63;
		}
	</style>
	<?php
	require("conn.php");
	if (isset($_POST['iniciar_sesion'])) {
		$usuar = $_POST['u'];
		$contra = MD5($_POST['p']);
		$tipo = "";
		$query = mYsqli_query($con,"select * from usuario WHERE usuari='$usuar' AND password='$contra'") 
		or die("error: ".mysqli_error($con));
		$nr = mysqli_num_rows($query);
		if (!($nr == 0)) {
			$mostrar = mysqli_fetch_array($query);
			$tipo = $mostrar['tipo'];
			$dni = $mostrar['DNI'];
			unset($_SESSION);
			session_start();
			$_SESSION['usuario'] = $usuar;
			$_SESSION['cod'] = array();
			$_SESSION['nom'] = array();
			$_SESSION['des'] = array();
			$_SESSION['pre'] = array();
			$_SESSION['can'] = array();
			$_SESSION['sub'] = array();
			$_SESSION['tipo'] = $tipo;
			$_SESSION['DNI'] = $dni;
			switch ($tipo) {
				case 'ADMINISTRADOR':
					header("Location:usuario/mantenimiento_usuarios.php");
					break;
				case 'EMPLEADO':
					header("Location:empleado/mantenimiento_venta.php");
					break;
				case 'CLIENTE':
					header("Location:clientes/mantenimiento_venta.php");
					break;
				
				default:

					break;
			}
		}else{
			echo "
			<script>
				$(document).ready(function(){
					$('#miModal_2').css('display','block');
				});
			</script>"
			;
		}
	}
	?>
</head>
<body>
	<center>
			<div>
				<br><br><br><br>
				<input type="button" id="ini" value="INICIAR SESION" class="btn">
			</div>

			<!--INICIAR SESION-->
	    		<div id="miModal_1" class="modal">
	    			<div class="flex" id="flex">
						<div class="contenido-modal">
							<div class="modal-header flex">
								INICIAR SESION
								<span class="close_1" id="close">&times;</span>
							</div>
							<div class="modal-body">
								<form method="post">
									<table>
										<tr>
											<td>
												USUARIO:
											</td>
											<td>
												<input type="text" name="u">
											</td>
										</tr>
										<tr>
											<td>
												PASSWORD:
											</td>
											<td>
												<input type="password" name="p">
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<center>
													<input type="submit" class="btn" name="iniciar_sesion" value="INICIAR SESION">
												</center>
											</td>
										</tr>
									</table>
								</form>
							</div>
			    		</div>
					</div>
				</div>
			<!--INICIAR SESION-->

			<!--SESSION DENEGADA-->
	    		<div id="miModal_2" class="modal">
	    			<div class="flex" id="flex">
						<div class="contenido-modal">
							<div class="modal-header flex">
								AVISO
								<span class="close_2" id="close">&times;</span>
							</div>
							<div class="modal-body">
								SESSION DENEGADA
							</div>
			    		</div>
					</div>
				</div>
			<!--SESSION DENEGADA-->
	</center>
	<script>
		$(document).ready(function(){
			$('#ini').on('click', function(){
				$('#miModal_1').css("display","block");
			});

			$('.close_1').on('click', function(){
				$('#miModal_1').css("display","none");
			});

			$('.close_2').on('click', function(){
				$('#miModal_2').css("display","none");
			});
		});
	</script>
</body>
</html>