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

		.flex,.flex1,.flex2{
			height: 100%;
			display: flex;
			align-items: center;
		}
		.modal,.modal1,.modal2{
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
		.contenido-modal,.contenido-modal1,.contenido-modal2{
			position: relative;
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
		.close,.close1,.close2{
			margin-left: 70%;
			transition: .5s;
			color: white;
			font-size: 30px;
		}
		.close:hover,.close1:hover,.close2:hover{
			text-decoration: none;
			cursor: pointer;
		}
		.modal-header,.footer,.modal-header1,.footer1,.modal-header2,.footer2{
			padding: 8px 16px;
			background: #080A1E;
			color: white;
			font-weight: bold;
			text-align: center;
		}
		.modal-header,.modal-header1,.modal-header2{
			border-bottom: 1px solid white;
		}
		.modal-body,.modal-body1,.modal-body2{
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
		#t7{
			width: 0.1px;
 			height: 0.1px;
 			opacity: 0;
 			overflow: hidden;
 			position: absolute;
 			z-index: -1;
 		}
 		#lb_t7{
 			transition: .5s;
 			color: black;
 			padding: 5px 10px 5px 10px;
 			background: white;
 		}
 		#lb_t7:hover{
 			transition: .5s;
 			padding: 5px 25px 5px 25px;
 		}
 		#editar, #editar input{
 			background-color: #ED2621;
 			color: white;
 		}
 		#agregar,#agregar input{
 			background-color: #ED7421;
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
    	require("conn.php");   
    	if (isset($_POST['btn2'])){
    		$cod=$_POST['t1'];
    		$nom=$_POST['t2'];
    		$des=$_POST['t3'];
    		$pre=$_POST['t4'];
    		$stc=$_POST['t5'];
    		$fv=$_POST['t6'];
    		$cat=$_POST['t8'];
    		$file_temp = $_FILES['t7']['tmp_name'];
			if(getimagesize($file_temp) == TRUE){
				$image = addslashes($_FILES['t7']['tmp_name']);
				$image = file_get_contents($image);
				$image = base64_encode($image);
				$sql = "INSERT INTO `producto`(`ID_PRODUCTO`, `NOMBRE_PRODUCTO`, `DESCRIPCION`, `PRECIO_PRODUCTO`, `STOCK_PRODUCTO`, 
				`FECHA_VNC`, `FOTO_PRODUCTO`, `ID_CAT`) VALUES ('$cod','$nom','$des','$pre','$stc','$fv','$image','$cat')";
				$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
			}else{
				$sql = "";
				$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
			}
    	}
    	if (isset($_POST['btn3'])){
    		$cod = $_POST['m_t1'];
    		$nom = $_POST['m_t2'];
    		$des = $_POST['m_t3'];
    		$pre = $_POST['m_t4'];
    		$f = $_POST['m_t6'];
    		$c = $_POST['m_t5'];
    		$sql = "UPDATE `producto` SET `ID_PRODUCTO`='$cod',`NOMBRE_PRODUCTO`='$nom',`DESCRIPCION`='$des',`PRECIO_PRODUCTO`='$pre',`FECHA_VNC`='$f',`ID_CAT`='$c' WHERE `ID_PRODUCTO`='$cod'";
			$insertar = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
    	}
    	if (isset($_POST['btn4'])){
    		$cod = $_POST['a_t1'];
    		$st = $_POST['a_t4'];
			$sql = "UPDATE `producto` SET `STOCK_PRODUCTO`='$st' WHERE ID_PRODUCTO='$cod'";
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
    	<center>
    		<header>
    			<div class="textos">
    				<a href="#" class="btn" id="abrir">NUEVO</a><br><br><br><br>
    			</div>
    		</header>
		</center>
		<form method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<th colspan="9">
						<div class="d1">
							LISTA
						</div>
					</th>
				</tr>
				<tr>
					<td>
						<center>
							<div class="d6">
								ID
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
								DESCRIPCION
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
								STOCK
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								FECHA DE VENCIMIENTO
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								FOTO
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d6">
								CATEGORIA
							</div>
						</center>
					</td>
					<td colspan="2">
						<center>
							<div class="d6">
								OPCION
							</div>
						</center>
					</td>
				</tr>
				<?php
				$lista = mYsqli_query($con,"select * from vista2") or die("error: ".mysqli_error());
				while ($mostrar = mysqli_fetch_array($lista)) {
				?>
				<tr>
					<td>
						<center>
							<div class="d7" id="id">
								<?php echo $mostrar['ID_PRODUCTO'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="nom">
								<?php echo $mostrar['NOMBRE_PRODUCTO'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="des">
								<?php echo $mostrar['DESCRIPCION'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="pre">
								<?php echo $mostrar['PRECIO_PRODUCTO'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="st">
								<?php echo $mostrar['STOCK_PRODUCTO'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="f">
								<?php echo $mostrar['FECHA_VNC'] ?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7">
								<?php echo " <img height='70' width='90' src='data:image;base64,".$mostrar['FOTO_PRODUCTO']." '>";?>
							</div>
						</center>
					</td>
					<td>
						<center>
							<div class="d7" id="cc">
								<?php echo $mostrar['NOMRE_CATEGORIA'] ?>
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
					<td>
						<center>
							<div class="d7" id="agregar">
								<input type="button" class="abrir2" value="AGREGAR">
							</div>
						</center>
					</td>
				</tr>
		        <?php 
	            }
		        ?>
			</table>

			<!-- MODAL REGISTRAR -->
    		<div id="miModal" class="modal">
    			<div class="flex" id="flex">
					<div class="contenido-modal">
						<div class="modal-header flex">
							REGISTRAR PRODUCTO
							<span class="close" id="close">&times;</span>
						</div>
						<div class="modal-body">
							<form method="post" enctype="multipart/form-data">
								<table>
									<tr>
										<td>
											<div class="d2">CODIGO:</div>
										</td>
										<td>
											<div class="d3">
												<input type="text" name="t1" id="t1">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">NOMBRE:</div>
										</td>
										<td>
											<div class="d3">
												<input type="text" name="t2" id="t2">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">DESCRIPCION:</div>
										</td>
										<td>
											<div class="d3">
												<input type="text" name="t3" id="t3">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">PRECIO:</div>
										</td>
										<td>
											<div class="d3">
												<input type="number" name="t4" id="t4">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">STOCK:</div>
										</td>
										<td>
											<div class="d3">
												<input type="NUMBER" name="t5" id="t5">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">FECHA DE VENCIMIENTO:</div>
										</td>
										<td>
											<div class="d3">
												<input type="DATE" name="t6" id="t6">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">FOTO:</div>
										</td>
										<td>
											<div class="d3">
												<input type="file" name="t7" id="t7">
												<label for="t7" id="lb_t7">AÑADIR FOTO</label>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">CATEGORIA:</div>
										</td>
										<td>
											<div class="d3">
												<select name="t8">
													<?php
													$lista = mYsqli_query($con,"SELECT * FROM `categoria`") or die("error: ".mysqli_error());
		                							while ($mostrar = mysqli_fetch_array($lista)) {
		                							?>
		                							<option value="<?php echo $mostrar['ID_CATEGORIA']?>">
		                								<?php echo $mostrar['NOMRE_CATEGORIA'] ?>
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
							ACTUALIZAR PRODUCTO
							<span class="close1" id="close1">&times;</span>
						</div>
						<div class="modal-body1">
							<form method="POST">
								<table>
									<tr>
										<td>
											<div class="d3">
												<input type="hidden" name="m_t1" id="m_t1">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">NOMBRE:</div>
										</td>
										<td>
											<div class="d3">
												<input type="text" name="m_t2" id="m_t2">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">DESCRIPCION:</div>
										</td>
										<td>
											<div class="d3">
												<input type="text" name="m_t3" id="m_t3">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">PRECIO:</div>
										</td>
										<td>
											<div class="d3">
												<input type="number" name="m_t4" id="m_t4">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">FECHA DE VENCIMIENTO:</div>
										</td>
										<td>
											<div class="d3">
												<input type="DATE" name="m_t6" id="m_t6">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">CATEGORIA:</div>
										</td>
										<td>
											<div class="d3">
												<select name="m_t5">
													<?php
													$lista = mYsqli_query($con,"SELECT * FROM `categoria`") or die("error: ".mysqli_error());
		                							while ($mostrar = mysqli_fetch_array($lista)) {
		                							?>
		                							<option value="<?php echo $mostrar['ID_CATEGORIA']?>">
		                								<?php echo $mostrar['NOMRE_CATEGORIA'] ?>
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

			<!-- MODAL AGREGAR -->
			<div id="miModal2" class="modal2">
				<div class="flex2" id="flex2">
					<div class="contenido-modal2">
						<div class="modal-header2 flex2">
							AGREGAR STOCK
							<span class="close2" id="close2">&times;</span>
						</div>
						<div class="modal-body2">
							<form method="POST">
								<table>
									<tr>
										<td>
											<div class="d3">
												<input type="hidden" id="a_t1" name="a_t1">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">NOMBRE:</div>
										</td>
										<td>
											<div class="d3">
												<input type="text" id="a_t2" disabled>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">DESCRIPCION:</div>
										</td>
										<td>
											<div class="d3">
												<input type="text" id="a_t3" disabled>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d2">STOCK:</div>
										</td>
										<td>
											<div class="d3">
												<input type="number" id="a_t4" name="a_t4">
											</div>
										</td>
									</tr>
								</table>
		                		<input type="SUBMIT" name="btn4" class="btn" id="btn4" value="ACTUALIZAR">
		            		</form>	
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL AGREGAR -->
		</form>
    </center>
    <script type="text/javascript">
    	//modal registrar
	    let modal = document.getElementById('miModal');
	    let flex = document.getElementById('flex');
	    let abrir = document.getElementById('abrir');
	    let cerrar = document.getElementById('close');
	    abrir.addEventListener('click',function(){modal.style.display= 'block';});
	    cerrar.addEventListener('click',function(){modal.style.display= 'none';});
	    //modal registrar

	    //modal actualizar
	    let modal1 = document.getElementById('miModal1');
	    let cerrar1 = document.getElementById('close1');
	    cerrar1.addEventListener('click',function(){modal1.style.display= 'none';});
	    //modal actualizar

	    //modal agregar
	    let modal2 = document.getElementById('miModal2');
	    let cerrar2 = document.getElementById('close2');
	    cerrar2.addEventListener('click',function(){modal2.style.display= 'none';});
	    //modal agregar
    </script>
    <script>
    	$(document).ready(function (){
    		$('.abrir1').on('click', function(){
    			$('#miModal1').css("display","block");
    			$(this).parents("tr").find("#id").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#m_t1").val(v1);
    			});
    			$(this).parents("tr").find("#nom").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#m_t2").val(v1);
    			});
    			$(this).parents("tr").find("#des").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#m_t3").val(v1);
    			});
    			$(this).parents("tr").find("#pre").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#m_t4").val(v1);
    			});
    			$(this).parents("tr").find("#cc").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#m_t5").val(v1);
    			});
    			$(this).parents("tr").find("#f").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#m_t6").val(v1);
    			});
    		});
    		$('.abrir2').on('click', function(){
    			$('#miModal2').css("display","block");
    			$(this).parents("tr").find("#id").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#a_t1").val(v1);
    			});
    			$(this).parents("tr").find("#nom").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#a_t2").val(v1);
    			});
    			$(this).parents("tr").find("#des").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#a_t3").val(v1);
    			});
    			$(this).parents("tr").find("#st").each(function() {
    				valores1 =$(this).html();
    				v1 = $.trim(valores1);
    				$("#a_t4").val(v1);
    			});
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
    </script>
</body>
</html>


