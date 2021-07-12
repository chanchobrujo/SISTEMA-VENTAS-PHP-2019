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
		.abrir1,.abrir2{
			transition: .5s;
			border-style: none;
			background: white;
			color: black;
		}
		.abrir1:hover,.abrir2:hover{
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
		#agregar,#agregar input{
 			background-color: #ED7421;
 			color: white;
 		}
		#vnt{
			transition: .5s;
 			background-color: #ED2621;
 			color: white;
 			border-style: none;
			padding: 5px 15px 5px 15px;
 		}
		#vnt:hover{
			transition: .5s;
			padding: 5px 20px 5px 20px;
 		}
 		.flex,.flex2,.flex3,.flex4,.flex5{
			height: 100%;
			display: flex;
			align-items: center;
		}
		.modal,.modal2,.modal3,.modal4,.modal5{
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
		.contenido-modal,.contenido-modal2,.contenido-modal4{
			position: relative;
			background-color: green;
			margin: auto;
			width: 30%;
			animation-name: modal;
			animation-duration: .5s;
			border: 1px solid white;
		}
		.contenido-modal3,.contenido-modal5{
			position: relative;
			background-color: green;
			margin: auto;
			width: 85%;
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
			text-decoration: none;
			cursor: pointer;
		}
		.close2,.close4{
			margin-left: 80%;
			transition: .5s;
			color: white;
			font-size: 30px;
			text-decoration: none;
			cursor: pointer;
		}
		.close3,.close5{
			margin-left: 85%;
			transition: .5s;
			color: white;
			font-size: 30px;
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
		#el{
			border-style: none;
			transition: .5s;
			font-size: 15px;
			background-color: #ED2621;
			color: white;
			cursor: pointer;
			padding: 5px 15px;
		}
		#el:hover{
			transition: .5s;
			padding: 5px 20px;
			letter-spacing: 5px;
		}
		.modal-header,.modal-header2,.modal-header3,.modal-header4,.modal-header5{
			padding: 8px 16px;
			background: #080A1E;
			color: white;
			font-weight: bold;
			text-align: center;
			border-bottom: 1px solid white;
		}
		.modal-body,.modal-body2,.modal-body3,.modal-body4,.modal-body5{
			padding: 20px 16px;
			background: #121C63;
		}
		.d2,.d3{
			text-decoration: none;
			cursor: pointer;
		}
		.texto{
			color: black;
			border-style: none;
			cursor: pointer;
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
	<?php 
    	require("conn.php");  
	    $tot = count($_SESSION['cod']);
		if (isset($_POST['btn2'])) {
			$id = $_POST['t1'];
			$nom = $_POST['t2'];
			$des = $_POST['t3'];
			$pre = $_POST['t4'];
			$can = $_POST['t5'];
			if ($can >= 1) {
				$sub = $can * $pre;
				for ($i=0; $i < $tot+1; $i++) { 
					if ($id == $_SESSION['cod'][$i]) {
						$pos = $i;
					}
				}
				if (isset($pos)) {
					$can0 = $_SESSION['can'][$pos];
					$pre0 = $_SESSION['pre'][$pos];
					$c = $can0 + $can;
					$sub0 = $pre0 * $c;
					$_SESSION['can'][$pos] = $c;
					$_SESSION['sub'][$pos] = $sub0;
					echo "
						<script>
							$(document).ready(function(){
								$('#miModal4').css('display','block');
							})
						</script>";							
				}
				else{
					if (isset($_SESSION['cod'])){
						array_push($_SESSION['cod'], $id);
					}
					if (isset($_SESSION['nom'])){
						array_push($_SESSION['nom'], $nom);
					}
					if (isset($_SESSION['des'])){
						array_push($_SESSION['des'], $des);
					}
					if (isset($_SESSION['pre'])){
						array_push($_SESSION['pre'], $pre);
					}
					if (isset($_SESSION['can'])){
						array_push($_SESSION['can'], $can);
					}
					if (isset($_SESSION['sub'])){
						array_push($_SESSION['sub'], $sub);
					}
					$tot = count($_SESSION['cod']);
					echo "
						<script>
							$(document).ready(function(){
								$('#miModal4').css('display','block');
							})
						</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('CANTIDAD INADECUADA');</script>";
			}
		}
		if (isset($_POST['b3'])) {
			$op = $_POST['b3'];
			if ($op == 0) {
				array_shift($_SESSION['cod']);
				array_shift($_SESSION['nom']);
				array_shift($_SESSION['des']);
				array_shift($_SESSION['pre']);
				array_shift($_SESSION['can']);
				array_shift($_SESSION['sub']);
				$tot = count($_SESSION['cod']);
			}else{
				if ($op == $tot - 1) {
					array_splice($_SESSION['cod'], $op);
					array_splice($_SESSION['nom'], $op);
					array_splice($_SESSION['des'], $op);
					array_splice($_SESSION['pre'], $op);
					array_splice($_SESSION['can'], $op);
					array_splice($_SESSION['sub'], $op);
					$tot = count($_SESSION['cod']);
				}else{
					$tot = count($_SESSION['cod']);
					for ($i=$op+1; $i < $tot; $i++) { 
						$_SESSION['cod'][$i-1] = $_SESSION['cod'][$i];
						$_SESSION['nom'][$i-1] = $_SESSION['nom'][$i];
						$_SESSION['des'][$i-1] = $_SESSION['des'][$i];
						$_SESSION['pre'][$i-1] = $_SESSION['pre'][$i];
						$_SESSION['can'][$i-1] = $_SESSION['can'][$i];
						$_SESSION['sub'][$i-1] = $_SESSION['sub'][$i];
					}
					array_splice($_SESSION['cod'], $tot - 1);
					array_splice($_SESSION['nom'], $tot - 1);
					array_splice($_SESSION['des'], $tot - 1);
					array_splice($_SESSION['pre'], $tot - 1);
					array_splice($_SESSION['can'], $tot - 1);
					array_splice($_SESSION['sub'], $tot - 1);
				}
			}
		}
		if (isset($_POST['b4'])) {
			array_splice($_SESSION['cod'],0);
			array_splice($_SESSION['nom'],0);
			array_splice($_SESSION['des'],0);
			array_splice($_SESSION['pre'],0);
			array_splice($_SESSION['can'],0);
			array_splice($_SESSION['sub'],0);
			echo "
				<script>
					$(document).ready(function(){
						$('#miModal2').css('display','block');
					});
				</script>";
		}
		if (isset($_POST['bventa'])) {
			$dni = $_POST['bventa'];
			$idcenta = $_POST['idcenta'];
			$sql = "INSERT INTO `venta`(`ID_VENTA`, `DNI_CLIENTE`, `FECHA`, `HORA`) VALUES ('$idcenta','$dni',CURDATE(),curTime())";
			$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));

			for ($i=0; $i < $tot; $i++) {
			    $idp = $_SESSION['cod'][$i];
			    $can = $_SESSION['can'][$i];
			    $sql = "UPDATE `producto` SET `STOCK_PRODUCTO`=`STOCK_PRODUCTO` - '$can' WHERE ID_PRODUCTO='$idp'";
				$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
				$sql = "INSERT INTO `dtl_venta`(ID_VENTA,ID_PRODUCTO,CANTIDAD) VALUES ('$idcenta','$idp','$can')";
				$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
			}

			array_splice($_SESSION['cod'],0);
			array_splice($_SESSION['nom'],0);
			array_splice($_SESSION['des'],0);
			array_splice($_SESSION['pre'],0);
			array_splice($_SESSION['can'],0);
			array_splice($_SESSION['sub'],0);
		}
    ?>   
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
						<li><a href="mantenimiento_cliente.php" class="d">CLIENTE</a></li>
						<li><a href="mantenimiento_producto.php" class="d">PRODUCTO</a></li>
					</ul>
				</li>
				<li>
					<a href="#">OPERACIONES</a>
					<ul>
						<li><a href="mantenimiento_venta.php" class="d">VENTA</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
    <center>
    	<h2>SISTEMA DE VENTA</h2>
    	<hr><br><hr><br><br>
		<form method="post">
			<form method="post">
				<input type="submit" class="btn" name="b4" value="ANULAR VENTA">
    			<input type="button" class="btn" id="vcrr" value="VER CARRITO">
			</form>
    		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    		<br><br><br><br>
			<table>
				<tr>
					<th colspan="9">
						<div class="d1">
							LISTA DE PRODUCTOS
							&nbsp&nbsp
							<?php
							if (count($_SESSION['cod']) >= 1) {
							?>
							<input type="button" class="real" id="vnt" value="REALIZAR VENTA">
							<?php
							}
							?>

						</div>
					</th>
				</tr>
				<tr>
					<td><center><div class="d6" id="id">ID</div></center></td>
					<td><center><div class="d6">NOMBRE</div></center></td>
					<td><center><div class="d6">DESCRIPCION</div></center></td>
					<td><center><div class="d6">PRECIO</div></center></td>
					<td><center><div class="d6">OPCION</div></center></td>
				</tr>
				<?php
				$lista = mYsqli_query($con,"select * from vista2") or die("error: ".mysqli_error());
				while ($mostrar = mysqli_fetch_array($lista)) {
				?>
				<tr>
					<td><center><div class="d7" id="id"><?php echo $mostrar['ID_PRODUCTO']?></div></center></td>
					<td><center><div class="d7" id="nom"><?php echo $mostrar['NOMBRE_PRODUCTO']?></div></center></td>
					<td><center><div class="d7" id="des"><?php echo $mostrar['DESCRIPCION']?></div></center></td>
					<td><center><div class="d7" id="pre"><?php echo $mostrar['PRECIO_PRODUCTO']?></div></center></td>	
					<td><center><div class="d7" id="agregar"><input type="button" class="abrir2" value="AGREGAR AL CARRITO"></div></center></td>
				</tr>
		        <?php 
	            }
		        ?>
			</table>

			<!-- MODAL AGREGAR -->
    		<div id="miModal" class="modal">
    			<div class="flex" id="flex">
					<div class="contenido-modal">
						<div class="modal-header flex">CANTIDAD A LLEVAR<span class="close" id="close">&times;</span>
						</div>
						<div class="modal-body">
							<form method="post">
								<table>
									<input type="hidden" name="t1" id="t1">
									<input type="hidden" name="t2" id="t2">
									<input type="hidden" name="t3" id="t3">
									<input type="hidden" name="t4" id="t4">
									<tr>
										<td><div class="d2">CANTIDAD:</div></td>
										<td><div class="d3"><input type="NUMBER" name="t5" id="t5" required></div></td>
									</tr>
								</table>
								<br><br>
								<input type="submit" name="btn2" class="btn" id="btn2" value="LLEVAR AL CARRITO">
		            		</form>
		            		
		        		</div>
		    		</div>
				</div>
			</div>
			<!-- MODAL AGREGAR -->

			<!-- MODAL VENTA ANULADA -->
    		<div id="miModal2" class="modal2">
    			<div class="flex2" id="flex2">
					<div class="contenido-modal2">
						<div class="modal-header2 flex2">AVISO<span class="close2" id="close2">&times;</span></div>
						<div class="modal-body2">VENTA ANULADA</div>
		    		</div>
				</div>
			</div>
			<!-- MODAL VENTA ANULADA -->

			<!-- MODAL VER CARRITO -->
    		<div id="miModal3" class="modal3">
    			<div class="flex3" id="flex3">
					<div class="contenido-modal3">
						<div class="modal-header3 flex3">VER CARRITO<span class="close3" id="close3">&times;</span></div>
						<div class="modal-body3">
							<form method="post">
								<table>
									<tr>
										<th colspan="8"><div class="d1">LISTA DE PRODUCTOS</div></th>
									</tr>
									<tr>
										<td><center><div class="d6">NUM</div></center></td>
										<td><center><div class="d6">ID</div></center></td>
										<td><center><div class="d6">NOMBRE</div></center></td>
										<td><center><div class="d6">DESCRIPCION</div></center></td>
										<td><center><div class="d6">PRECIO</div></center></td>
										<td><center><div class="d6">CANTIDAD</div></center></td>
										<td><center><div class="d6">SUBTOTAL</div></center></td>
										<td><center><div class="d6">OPCION</div></center></td>
									</tr>
									<?php
									$tot = count($_SESSION['cod']);
									for ($i=0; $i < $tot; $i++) {
									?>
										<tr>
											<input type="hidden" name="op">
											<td><center><div class="d7"><?php echo $i; ?></div></center></td>
											<td><center><div class="d7"><?php echo $_SESSION['cod'][$i]; ?></div></center></td>
											<td><center><div class="d7"><?php echo $_SESSION['nom'][$i]; ?></div></center></td>
											<td><center><div class="d7"><?php echo $_SESSION['des'][$i]; ?></div></center></td>
											<td><center><div class="d7"><?php echo $_SESSION['pre'][$i]; ?></div></center></td>
											<td><center><div class="d7"><?php echo $_SESSION['can'][$i]; ?></div></center></td>
											<td><center><div class="d7"><?php echo $_SESSION['sub'][$i]; ?></div></center></td>
											<td>
												<center>
													<input type="submit" name="b3" value="<?php echo $i; ?>" id="el">
												</center>
											</td>
										</tr>
									<?php
									}
									?>
								</table>
							</form>
		        		</div>
		    		</div>
				</div>
			</div>
			<!-- MODAL VER CARRITO -->

			<!-- MODAL AVISO DE PRODUCTO AGREGADO -->
    		<div id="miModal4" class="modal4">
    			<div class="flex4" id="flex4">
					<div class="contenido-modal4">
						<div class="modal-header4 flex4">AVISO<span class="close4" id="close4">&times;</span></div>
						<div class="modal-body4">PRODUCTO AGREGADO</div>
		    		</div>
				</div>
			</div>
			<!-- MODAL AVISO DE PRODUCTO AGREGADO -->

			<!-- MODAL REALIZAR VENTA -->
    		<div id="miModal5" class="modal5">
    			<div class="flex5" id="flex5">
					<div class="contenido-modal5">
						<div class="modal-header5 flex5">VENTA<span class="close5" id="close5">&times;</span></div>
						<div class="modal-body5">
							<form method="post">
							    <center>
							    	
							    </center>
								<table>
									<tr>
										<td>
											<div class="d2">ID VENTA:</div>
										</td>
										<td>
											<div class="d3">
												<input type="text" name="idcenta" class="texto">
											</div>
										</td>
									</tr>
									<tr>
										<th colspan="2">
											<div class="d1">
												LISTA DE CLIENTES
											</div>
										</th>
									</tr>
									<?php
									$lista = mYsqli_query($con,"select * from cliente") or die("error: ".mysqli_error());
									while ($mostrar = mysqli_fetch_array($lista)) {
									?>
									<tr>
										<input type="hidden" name="dni">
										<td>
											<center>
												<div class="d7">
													<input type="text" class="texto" name="dni" value="<?php echo $mostrar['DNI_CLIENTE']?>" readonly>
												</div>
											</center>
										</td>
										<td>
											<center>
												<div class="d7">
													<?php echo $mostrar['NOMBRE_CLIENTE'] .' '.$mostrar['APELLIDO_CLIENTE'] ?>
												</div>
											</center>
										</td>
										<td>
											<center>
												<div>
													<button type="submit" class="btn" name="bventa" value="<?php echo $mostrar['DNI_CLIENTE']?>">
														ELEJIR
													</button>
												</div>
											</center>
										</td>

									</tr>
							        <?php 
						            }
							        ?>
			                    </table>
							</form>
						</div>
		    		</div>
				</div>
			</div>
			<!-- MODAL REALIZAR VENTA -->
		</form>
    </center>
    <script>
    	//m registrar
    	$('.abrir2').on('click', function(){
    		$('#miModal').css("display","block");
    		$(this).parents("tr").find("#id").each(function() {
    			valores1 =$(this).html();
    			v1 = $.trim(valores1);
    			$("#t1").val(v1);
    		});
    		$(this).parents("tr").find("#nom").each(function() {
    			valores1 =$(this).html();
    			v1 = $.trim(valores1);
    			$("#t2").val(v1);
    		});
    		$(this).parents("tr").find("#des").each(function() {
    			valores1 =$(this).html();
    			v1 = $.trim(valores1);
    			$("#t3").val(v1);
    		});
    		$(this).parents("tr").find("#pre").each(function() {
    			valores1 =$(this).html();
    			v1 = $.trim(valores1);
    			$("#t4").val(v1);
    		});
    	});
    	$('.close').on('click', function(){$('#miModal').css("display","none");});
    	//m registrar

    	//m ver carrito
    		$('#vcrr').on('click', function(){$('#miModal3').css("display","block");});
    		$('.close3').on('click', function(){$('#miModal3').css("display","none");});
    	//m ver carrito

    	//m agregado
    		$('.close4').on('click', function(){$('#miModal4').css("display","none");});
    	//m agregado

    	//m venta anulada
    		$('.close2').on('click', function(){$('#miModal2').css("display","none");});
    	//m venta anulada

    	//m realizar venta
    		$('.real').on('click', function(){
    			$('#miModal5').css("display","block");
    		});
    		$('.close5').on('click', function(){$('#miModal5').css("display","none");});
    	//m realizar venta


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
    </script>
</body>
</html>


