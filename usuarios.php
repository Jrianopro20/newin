<!DOCTYPE html>
<html lang="en">
<head>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Usuarios</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
.row {
    width: 600px;
}
</style>
</head>
<body>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
  </div>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <!--Pages links-->
    <br>
    <div class="Dashboard"><a href="admin_portada.php"><span class="material-symbols-outlined">dashboard</span>Dashboard</a></div><div class="active"></div>
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


<form action="">

</form>


<button id="myBtn" class="open">Agregar Material</button>



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
                
                <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1 id="HoraActual1"> </h1>
    <h1 id="HoraActual1"> </h1>
    <h1>Salidas de Materiales</h1>
    <form action="usuarios.php" method="post" class="salidas-materiales">
      <label>Codigo</label> &nbsp; <br> <input class="cod" type="text" name="cod" required> <br>
      <Label>Descripcion</Label> &nbsp; <br>  <input class="desc" type="text" name="desc" required> <br>
      <label>cantidad</label> &nbsp; <br> <input class="num" type="number" name="cantidad" required> <br>
      <label>aporte</label> &nbsp; <br> <select class="apo" name="apo">
        <option>Sym</option>
        <option>Air-e</option>
      </select>
      <label>Fecha y Hora</label>  &nbsp; <br> <input class="date" type="datetime-local" name="datetime" required>
      
            <br>
            <input type="submit" value="Guardar" class="guardar"></form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script src="script.js"></script>
</body>
</html>

<?php
$servername = "127.0.0.1";
$database = "login";
$username = "root";
$password = "";
//conexion
$sql = "INSERT INTO materiales (codigo, descripcion, aporte, stock, fecha) VALUES ('{$_POST['cod']}', '{$_POST['desc']}','{$_POST['apo']}','{$_POST['cantidad']}', '{$_POST['datetime']}');";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (mysqli_query( $conn, $sql)) {
}
mysqli_close($conn);
// Desactivar toda las notificaciónes del PHP

error_reporting(0);

 
// Notificar solamente errores de ejecución

error_reporting(E_ERROR | E_WARNING | E_PARSE);


error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


// Mostrar todos los errores menos el E_NOTICE

// Valor predeterminado ya descrito en php.ini

error_reporting(E_ALL ^ E_NOTICE);


//Notificar todos los errores de PHP

error_reporting(E_ALL);


// Notificar todos los errores de PHP
error_reporting(-1);

 

// Lo mismo que error_reporting(E_ALL);

ini_set('error_reporting', E_ALL)

?>
