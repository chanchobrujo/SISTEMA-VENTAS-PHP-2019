<!DOCTYPE html>
<html>
<?php
    session_start(); 
?>
<head>
	<title></title>
	<?php
	require("../conn.php");
	if (isset($_POST['btn1'])) {
		$nombre = $_POST['t1'];
		$apellido = $_POST['t2'];
		$usuario = $_POST['t3'];
		$contraseña = MD5($_POST['t4']);
		$dni = $_POST['t0'];
		$id_dis = $_POST['t6'];
		$tp = $_POST['t5'];
		switch ($tp) {
			case 'CLIENTE':
				$sql = "INSERT INTO `cliente` (`DNI_CLIENTE`, `NOMBRE_CLIENTE`, `APELLIDO_CLIENTE`, `ID_DIS`) 
	    		VALUES ('$dni', '$nombre', '$apellido', '$id_dis');";
	    		$i = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));

				$sql = "INSERT INTO `usuario`(`usuari`, `password`, `tipo`, `nombre`, `apellido`, `DNI`, `ID_DIS`) 
				VALUES ('$usuario','$contraseña','$tp','$nombre','$apellido','$dni','$id_dis')";
	    		$i = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));

				break;
			case 'EMPLEADO':
				$sql = "INSERT INTO `usuario`(`usuari`, `password`, `tipo`, `nombre`, `apellido`, `DNI`, `ID_DIS`) 
				VALUES ('$usuario','$contraseña','$tp','$nombre','$apellido','$dni','$id_dis')";
	    		$i = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
				break;
			case 'ADMINISTRADOR':
				$sql = "INSERT INTO `usuario`(`usuari`, `password`, `tipo`, `nombre`, `apellido`, `DNI`, `ID_DIS`) 
				VALUES ('$usuario','$contraseña','$tp','$nombre','$apellido','$dni','$id_dis')";
	    		$i = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
				break;
			
			default:
				# code...
				break;
		}
	}
	?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<style type="text/css">

		*{
		    font-family: monospace;
		    text-decoration: none;
		    letter-spacing: 2.5px;
	    	color: white;
		}
		body{
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
		.d1{
			padding: 10px 45px 10px 45px;
	    	border-bottom: 1px solid white;
		}
		.d6{
			padding: 5px;
		}
		.d7{
			background-color: white;
			color: #080A1E; 
			padding: 5px 15px 5px 15px;
		}
		.d7 a{
			transition: .5s;
			background-color: white;
			color: #080A1E;
		}
		.d7 a:hover{
			transition: .5s;
	    	border-bottom: 1px solid #080A1E;
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
			background-color: rgba(0,0,0,0.452);
		}
		.contenido-modal{
			position: relative;
			background-color: green;
			margin: auto;
			width: 45%;
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
		.close{
			margin-left: 70%;
			transition: .5s;
			color: white;
			font-size: 30px;
		}
		.close:hover{
			text-decoration: none;
			cursor: pointer;
		}
		.modal-header{
			padding: 8px 16px;
			background: #080A1E;
			color: white;
			font-weight: bold;
			text-align: center;
		}
		.modal-header{
			border-bottom: 1px solid white;
		}
		.modal-body{
			padding: 20px 16px;
			background: #121C63;
		}

		.d2,.d3{
			margin-top: 10px;
		}
		.d3 input{
			height: 15px;
			transition: .5s;
			width: 250px;
			border-style: none;
			border: 1px solid #121C63;
			padding: 5px;
			background-color: white;
			color: #080A1E; 
		}
		.d3 input:hover{
			transition: .5s;
			width: 250px;
			height: 20px;
		}
		.d3 input[type='number']{
			width: 50px;
		}
		.d3 select{
			height: 30px;
			border-style: none;
			border: 1px solid #121C63;
			padding: 5px;
			background-color: white;
			color: #080A1E; 
		}
		.d3 select option{
			color: #080A1E;
		}
		a{
			transition: .3s;
	    	color: white;
		}
		.m{
			width: 3.5rem;
			height: 3.7rem;
			background: #2EE3AD;
			border-radius: 0.5rem;
			position: absolute;
			top: 50%;
			left: 0;
			font-family: sans-serif;
			font-size: 2.5rem;
			color: white;
			text-align: center;
			transition: left 0.7s;
	    	background-color: #121C63;
		}
		.cb{
			display: none;
		}
		.cb:checked ~ .m{
			transition: left 0.7s;
			left: 40%;
			border-radius: 0 0.5rem 0.5rem 0;
		}
		.lp{
			width: 40%;
			height: 100%;
			position: absolute;
			top: 0;
			left: -40%;
			display: flex;
			align-items: center;
			justify-content: center;
			transform: left .4s;
			background: #2EE3AD;
			transition: left 0.7s;
	    	background-color: #121C63;
		}
		.cb:checked ~ .lp{
			transition: left 0.7s;
			left: 0;
		}
		.cont-menu{
			font-size: 20px;
			width: 90%;
			min-width: 90%;
			margin: 50px;
			display: inline-block;
			color:  white;
			text-align: center;
		}
		.cont-menu .menu{
			width: 86%;
			background: #080A1E;
		}
		.cont-menu ul{
			list-style: none;
		}
		.cont-menu .menu li a{
			display: block;
			padding: 15px 70px;
			background: #080A1E;
		}
		.cont-menu .menu ul{
			display: none;
		}
		.cont-menu .menu ul li a{
			background: #121C63;
		}

		.cont-menu .menu li .d:hover{
			border: 1.5px solid #121C63;
			background: #2A3376;
		}
	</style>
</head>
<body>
	<input type="checkbox" class="cb" id="cb">
	<label for="cb" class="m">|||</label>
	<div class="lp">
		<div class="cont-menu">
			<?php echo $_SESSION['usuario'].' - '.$_SESSION['tipo']; ?>
			<ul class="menu">
				<li>
					<a href="#">CERRAR SESION</a>
					<ul>
						<li><a href="../index.php" class="d">CERRAR SESION</a></li>
					</ul>
				</li>
				<li>
					<a href="#">MANTENIMIENTOS</a>
					<ul>
						<li><a href="../usuario/mantenimiento_usuarios.php" class="d">USUARIOS</a></li>
						<li><a href="../cliente/mantenimiento_cliente.php" class="d">CLIENTE</a></li>
						<li><a href="../producto/mantenimiento_producto.php" class="d">PRODUCTO</a></li>
					</ul>
				</li>
				<li>
					<a href="#">OPERACIONES</a>
					<ul>
						<li><a href="../venta/mantenimiento_venta.php" class="d">VENTA</a></li>
					</ul>
				</li>
				<li>
					<a href="#">REPORTES</a>
					<ul>
						<li><a href="../reportes/reporte_1.php" class="d">INGRESOS POR CLIENTE</a></li>
						<li><a href="../reportes/reporte_2.php" class="d">INGRESOS POR FECHA</a></li>
						<li><a href="../reportes/reporte_3.php" class="d">3</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<center>
    	<center>
    		<header>
    			<div class="textos">
    				<a href="#" class="btn" id="abrir">NUEVO</a>
    			</div>
    		</header>
		</center>
		<form method="post">
			<table>
				<tr>
					<th colspan="4">
						<div class="d1">
							LISTA
						</div>
					</th>
				</tr>
				<tr>
					<td>
						<center>
							<div class="d6">
								USUARIO
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								TIPO
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								NOMBRE
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								APELLIDO
							</div>
						</center>
					</td>
				</tr>
				<?php
				$lista = mYsqli_query($con,"select * from usuario") or die("error: ".mysqli_error());
				while ($mostrar = mysqli_fetch_array($lista)) {
				?>
				<tr>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['usuari'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['tipo'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['nombre'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['apellido'] ?>
							</div>
						</center>
					</td>
				</tr>
		        <?php 
	            }
		        ?>
			</table>

			<!-- MODAL NUEVO USUARIO -->
    		<div id="miModal_1" class="modal">
    			<div class="flex" id="flex">
					<div class="contenido-modal">
						<div class="modal-header flex">
							NUEVO USUARIO
							<span class="close" id="close_1">&times;</span>
						</div>
						<div class="modal-body">
							<table>
								<tr>
									<td>
										<div class="d2">DNI:</div>
									</td>
									<td>
										<div class="d3">
											<input type="number" name="t0">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d2">NOMBRES:</div>
									</td>
									<td>
										<div class="d3">
											<input type="text" name="t1">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d2">APELLIDOS:</div>
									</td>
									<td>
										<div class="d3">
											<input type="text" name="t2">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d2">USUARIO:</div>
									</td>
									<td>
										<div class="d3">
											<input type="text" name="t3">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d2">CONTRASEÑA:</div>
									</td>
									<td>
										<div class="d3">
											<input type="text" name="t4">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d2">TIPO:</div>
									</td>
									<td>
										<div class="d3">
											<select name="t5">
												<option value="ADMINISTRADOR">ADMINISTRADOR</option>
												<option value="EMPLEADO">EMPLEADO</option>
												<option value="CLIENTE">CLIENTE</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="d2">DISTRITO:</div>
									</td>
									<td>
										<div class="d3">
											<select name="t6">
												<?php
												$lista = mYsqli_query($con,"SELECT * FROM `distrito`") or die("error: ".mysqli_error());
		                						while ($mostrar = mysqli_fetch_array($lista)) {
		                						?>
		                						<option value="<?php echo $mostrar['ID_DISTRITO']?>">
		                							<?php echo $mostrar['NOMBRE'] ?>
		                						</option>
		                						<?php 
		                						}
		                						?>
		                					</select>
		                				</div>
		                			</td>
		                		</tr>
								<tr>
									<td colspan="2">
										<center>
											<button type="submit" class="btn" name="btn1">REGISTRAR</button>
										</center>
									</td>
								</tr>
							</table>
						</div>
		    		</div>
				</div>
			</div>
			<!-- MODAL NUEVO USUARIO -->

		</form>
	</center>
    <script>
    	$(document).ready(function (){
    		$('#abrir').on('click', function(){
    			$('#miModal_1').css("display","block");
    		});
    		$('#close_1').on('click', function(){
    			$('#miModal_1').css("display","none");
    		});
			$('.menu li:has(ul)').click(function(){
				
				if ($(this).hasClass('ac')) {
					$(this).removeClass('ac');
					$(this).children('ul').slideUp();
				}else{
					$('.menu li ul').slideUp();
					$('.menu li').removeClass('ac');
					$(this).addClass('ac');
					$(this).children('ul').slideDown();
				}
			});
    	});
    </script>
</body>
</html>