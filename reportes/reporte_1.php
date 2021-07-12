<!DOCTYPE html>
<html>
<?php
	
    session_start(); 
?>
<head>
	<title></title>
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
		#t7{
			width: 0.1px;
 			height: 0.1px;
 			opacity: 0;
 			overflow: hidden;
 			position: absolute;
 			z-index: -1;
 		}
 		a{
			transition: .3s;
	    	color: white;
		}
		.texto{
			color: black;
			border-style: none;
			cursor: pointer;
			padding: 5px;
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
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<?php
		require('../conn.php');
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
		<form method="post">
			<div class="d6">
				DNI DEL CLIENTE: 
				<input type="text" class="texto" name="t1">
				<input type="submit" class="btn" name="btn1" value="BUSCAR">				
			</div>
			<table>
				<tr>
					<th colspan="6">
						<div class="d1">LISTA</div>
					</th>
				</tr>
				<tr>
					<td>
						<center>
							<div class="d6">
								CLIENTE
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								DATO DE LA VENTA
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								PRODUCTO
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								PRECIO
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								CANTIDAD
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								SUBTOTAL
							</div>
						</center>
					</td>
				</tr>
				<?php
					$dni =0;
					if (isset($_POST['btn1'])) {
						$dni =$_POST['t1'];
						echo "<a href='pdf1.php?dni=".$dni."'  class='btn'>GENERAR REPORTE</a>";
					}
					$st = 0;
					$sql ="call procedimiento_reporte1('$dni')";
					$lista = mYsqli_query($con,$sql) or die("error: ".mysqli_error($con));
					while ($mostrar = mysqli_fetch_array($lista)) {
				?>
						<tr>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['CLIENTE'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['DATO DE LA VENTA'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['PRODUCTO'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['PRECIO'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['CANTIDAD'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo $mostrar['SUBTOTAL'] ?>
							</div>
						</center>
					</td>
						</tr>
				<?php
						$st = $mostrar['SUBTOTAL'] +$st;
					}
				?>
				<tr>
					<td>
						<div class="d6">TOTAL: <?php echo $st; ?> SOLES</div>
					</td>
				</tr>
		    </table>
		</form>
	</center>
	<script>
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