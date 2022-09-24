<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Dashboard</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">

</style>
</head>
	<body>
		<!--sidebar-->
	<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
  </div>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!--Pages links-->
    <br><div class="active"></div>
    <div class="Dashboard"><a href="index.html"><span class="material-symbols-outlined">dashboard</span>Dashboard</a></div>
    <div><a href="usuarios.php"><span class="material-symbols-outlined">
group
</span>Usuarios</a></div>
    <div class="Entradas"><a href="entradas.html"><span class="material-symbols-outlined">arrow_back</span>Entradas</a></div>
    <div class="Salidas"><a href="salidas.html"><span class="material-symbols-outlined">arrow_forward</span>Salidas</a></div>
    <div class="Configuracion"><a href=""><span class="material-symbols-outlined">settings</span>Configuracion</a></div>
    <div class="Logout"><a href="../cerrar_sesion.php"><span class="material-symbols-outlined">
      logout
      </span>Cerrar Sesion</a></div>
  </div>	
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>Pagina Administrativa</h1>
				
				<h3>
				<?php
				session_start();

				if(!isset($_SESSION['admin_login']))	
				{
					header("location: ../index.ph");  
				}

				if(isset($_SESSION['personal_login']))	
				{
					header("location: ../personal/personal_portada.php");	
				}

				if(isset($_SESSION['usuarios_login']))	
				{
					header("location: ../usuarios/usuarios_portada.php");
				}
				
				if(isset($_SESSION['admin_login']))
				{
				?>
					Bienvenido,
				<?php
						echo $_SESSION['admin_login'];
				}
				?>
				</h3>
					
			</center>
            <hr>	
		</div>
		
		<br><br><br>
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Panel de usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="4%">ID</th>
                                            <th width="18%">Usuario</th>
                                            <th width="24%">Email</th>
                                            <th width="19%">Rol</th>
                                            <th width="24%">Password</th>
											<th colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									require_once '../DBconect.php';
									$select_stmt=$db->prepare("SELECT id,username,email,role FROM mainlogin");
									$select_stmt->execute();
									
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["role"]; ?></td>
                                            <td>*******</td>
											<td width="4%"><button class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></td>
											<td width="7%"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
                                        </tr>
									<?php 
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		
	</div>
			
	</div>
				<!--sidebar-->
				<!--Sidebar-->
  				
<script src="script.js"></script>
	</body>
</html>