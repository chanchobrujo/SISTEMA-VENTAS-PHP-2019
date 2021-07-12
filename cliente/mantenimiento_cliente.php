<!DOCTYPE html>
<html>
<?php
    session_start(); 
?>
<head>
	<title></title>
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
		.abrir1{
			transition: .5s;
			border-style: none;
			background: white;
			color: black;
		}
		.abrir1:hover{
			transition: .5s;
			letter-spacing: 4px;
			cursor: pointer;
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

		.flex,.flex1{
			height: 100%;
			display: flex;
			align-items: center;
		}
		.modal,.modal1{
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
		.contenido-modal,.contenido-modal1{
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
		.close,.close1{
			margin-left: 70%;
			transition: .5s;
			color: white;
			font-size: 30px;
		}
		.close:hover,.close1:hover{
			text-decoration: none;
			cursor: pointer;
		}
		.modal-header,.footer,.modal-header1,.footer1{
			padding: 8px 16px;
			background: #080A1E;
			color: white;
			font-weight: bold;
			text-align: center;
		}
		.footer,.footer1{
			border-top: 1px solid white;
		}
		.modal-header,.modal-header1{
			border-bottom: 1px solid white;
		}
		.modal-body,.modal-body1{
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
		#editar, #editar input{
 			background-color: #ED2621;
 			color: white;
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
    <?php 
    	require("../conn.php");  
    	if (isset($_POST['btn2'])) {
    		$dni = $_POST['t1'];
	    	$nom = $_POST['t2'];
	    	$ap = $_POST['t3'];
	    	$id_dis = $_POST['t5'];
	    	$sql = "INSERT INTO `cliente` (`DNI_CLIENTE`, `NOMBRE_CLIENTE`, `APELLIDO_CLIENTE`, `ID_DIS`) 
	    		VALUES ('$dni', '$nom', '$ap', '$id_dis');";
	    	$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
    	}
    	if (isset($_POST['btn3'])){
    		$dni = $_POST['m_t1'];
	    	$nom = $_POST['m_t2'];
	    	$ap = $_POST['m_t3'];
	    	$id_dis = $_POST['m_t5'];
	    	$sql = "UPDATE `usuario` SET `nombre`='$nom',`apellido`='$ap' WHERE DNI='$dni'";
	    	$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
	    	$sql = "UPDATE cliente SET DNI_CLIENTE='$dni',NOMBRE_CLIENTE='$nom',APELLIDO_CLIENTE='$ap',ID_DIS='$id_dis' WHERE DNI_CLIENTE='$dni';";
	    	$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
	    	
    	}
    ?>
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
						<li><a href="../reportes.php/reporte_1.php" class="d">INGRESOS POR CLIENTE</a></li>
						<li><a href="../reportes.php/reporte_2.php" class="d">INGRESOS POR FECHA</a></li>
						<li><a href="../reportes.php/reporte_3.php" class="d">3</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<input type="checkbox" class="cb" id="cb">
	<label for="cb" class="m">|||</label>
	<div class="lp">
		<div class="cont-menu">
			<?php echo $_SESSION['usuario'].' - '.$_SESSION['tipo']; ?>
			<ul class="menu">
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
    				<a href="#" class="btn" id="abrir">NUEVO</a><br><br><br><br>
    			</div>
    		</header>
		</center>
		<form method="POST">
			<table>
				<tr>
					<th colspan="5">
						<div class="d1">
							LISTA
						</div>
					</th>
				</tr>
				<tr>
					<th>
						<center>
							<div class="d6">
								DNI
							</div>
						</center>
					</th>
					<th>
						<center>
							<div class="d6">
								NOMBRE
							</div>
						</center>
					</th>
					<th>
						<center>
							<div class="d6">
								APELLIDO
							</div>
						</center>
					</th>
					<th>
						<center>
							<div class="d6">
								DISTRITO 
							</div>
						</center>
					</th>
					<th>
						<center>
							<div class="d6">
								OPCION
							</div>
						</center>
					</th>
				</tr>
				<?php
				$lista = mYsqli_query($con,"select * from vista1") or die("error: ".mysqli_error($con));
				while ($mostrar = mysqli_fetch_array($lista)) {
				?>
				<tR>
					<td >
						<center>
							<div class="d7" id="dni">
								<?php echo $mostrar['DNI_CLIENTE'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="nom">
								<?php echo $mostrar['NOMBRE_CLIENTE'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="app">
								<?php echo $mostrar['APELLIDO_CLIENTE'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['NOMBRE'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="editar">
						        <input type="button" class="abrir1" value="EDITAR">
							</div>
						</center>
					</td>
		        </tR>
		        <?php 
	            }
		        ?>
			</table>

			<!-- MODAL REGISTRAR -->
    		<div id="miModal" class="modal">
    			<div class="flex" id="flex">
					<div class="contenido-modal">
						<div class="modal-header flex">
							REGISTRAR CLIENTE
							<span class="close" id="close">&times;</span>
						</div>
						<div class="modal-body">
							<form method="POST">
								<table>
									<tr>
										<td>
											<div class="d2">DNI:</div>
										</td>
										<td>
											<div class="d3"><input type="text" name="t1" required></div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">NOMBRE:</div>
										</td>
										<td>
											<div class="d3"><input type="text" name="t2" required></div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">APELLIDO:</div>
										</td>
										<td>
											<div class="d3"><input type="text" name="t3" required></div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">DISTRITO:</div>
										</td>
										<td>
											<div class="d3">
												<select name="t5">
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
		                		</table>
		                		<button type="SUBMIT" name="btn2" class="btn" id="btn2">REGISTRAR</button>
		            		</form>	
		        		</div>
		        		
		    		</div>
				</div>
			</div>
			<!-- MODAL REGISTRAR -->

			<!-- MODAL ACTUALIZAR -->
			<div id="miModal1" class="modal1">
				<div class="flex1" id="flex1">
					<div class="contenido-modal1">
						<div class="modal-header1 flex1">
							ACTUALIZAR CLIENTE
							<span class="close1" id="close1">&times;</span>
						</div>
						<div class="modal-body1">
							<form method="POST">
								<table>
									<tr>
										<td>
											<div class="d2">DNI:</div>
										</td>
										<td>
											<div class="d3"><input type="text" name="m_t1" id="m_t1"></div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">NOMBRE:</div>
										</td>
										<td>
											<div class="d3"><input type="text" name="m_t2" id="m_t2"></div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">APELLIDO:</div>
										</td>
										<td>
											<div class="d3"><input type="text" name="m_t3" id="m_t3"></div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">DISTRITO:</div>
										</td>
										<td>
											<div class="d3">
												<select name="m_t5">
													<?php
													$lista = mYsqli_query($con,"SELECT * FROM `distrito`") 
													or die("error: ".mysqli_error());
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
		                		</table>
		                		<input type="SUBMIT" name="btn3" class="btn" id="btn3" value="ACTUALIZAR">
		            		</form>	
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL ACTUALIZAR -->
		</form>
    </center>
    <script type="text/javascript">
    	//modal registrar
	    let modal = document.getElementById('miModal');
	    let modal1 = document.getElementById('miModal1');
	    let flex = document.getElementById('flex');
	    let abrir = document.getElementById('abrir');
	    let cerrar = document.getElementById('close');
	    abrir.addEventListener('click',function(){modal.style.display= 'block';});
	    cerrar.addEventListener('click',function(){modal.style.display= 'none';});
	    //modal registrar

	    //modal actualizar
	    let cerrar1 = document.getElementById('close1');
	    cerrar1.addEventListener('click',function(){modal1.style.display= 'none';});
	    //modal actualizar
    </script>
    <script>
    	$(document).ready(function (){
    		$('.abrir1').on('click', function(){
    			$('#miModal1').css("display","block");
    			$(this).parents("tr").find("#dni").each(function() {
    				valores = parseInt($(this).html());
    				$("#m_t1").val(valores);
    			});
    			$(this).parents("tr").find("#nom").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#m_t2").val(v1);
    			});
    			$(this).parents("tr").find("#app").each(function() {
    				valores2= $(this).html().toString();
    				v2 = $.trim(valores2);
    				$("#m_t3").val(v2);
    			});
    			
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


