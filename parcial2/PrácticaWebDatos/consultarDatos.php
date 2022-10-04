<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica de web con bases de datos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.6.1.js"></script>
</head>
<body>

    <?php
      include 'conexion.php';
      $sql = "select * from usuarios";
      $datos = $conexion->query($sql);

    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Práctica Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registroDatos.html">Registrar</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Opciones
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.html">Inicio</a>
                <a class="dropdown-item" href="registroDatos.html">Registrar</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="consultarDatos.php">Consultar</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </div>
      </nav>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Domicilio</th>
                            <th>Fecha de nacimiento</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if($datos->num_rows > 0) { 
                        while($row = $datos->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["nombre"]; ?></td>
                            <td><?php echo $row["edad"]; ?></td>
                            <td><?php echo $row["sexo"]; ?></td>
                            <td><?php echo $row["domicilio"]; ?></td>
                            <td><?php echo $row["fecha_nacimiento"]; ?></td>
                            <td>
                                <a href="registroDatos.html" class="btn btn-primary">Editar</a>
                                <a href="" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                      <?php
                        }
                      }
                      $conexion->close();
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <footer class="text-center">
        <br>
        2022 &copy; Cetis107 Desarrollo Web
      </footer>
    <script src="js/bootstrap.js"></script>
</body>
</html>