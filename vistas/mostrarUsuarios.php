<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Crud MVC</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="css/estilos.css" />
</head>

<body>
  <header>
    <h1>Crud MVC</h1>
  </header>
  <div class="contenedorInsertar">
    <a href="index.php?metodo=create">Insertar </a>
    <span class="material-symbols-outlined enlace_agregar"> add </span>
  </div><br>
  <?php
  if (isset($_GET["mensaje"])) {
    $mensaje = $_GET["mensaje"];
    $usuario =  $_GET["usuario"];
    if ($mensaje === "insertado" || $mensaje === "actualizado" || $mensaje === "borrado") {
      echo "<p class='exito'> El usuario $usuario ha sido $mensaje correctamente. </p> <br>";
    } else if ($mensaje === "no insertado" || $mensaje === "no actualizado" || $mensaje === "no borrado") {
      echo "<p class='error'> Error, el usuario $usuario no se ha $mensaje correctamente </p> <br>";
    }
  }
  ?>
  <main>
    <table id="tabla">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Acciones</th>

        </tr>
      </thead>
      <tbody id="cuerpoTabla">
        <?php
        if (count($usuarios) > 0) {
          for ($i = 0; $i < count($usuarios); $i++) {
            echo "<tr>";
            echo "<td>  <a href='index.php?metodo=show&id=" . $usuarios[$i]["id"] . "'>" . $usuarios[$i]["id"] . "</a> </td>";
            echo "<td>" .  $usuarios[$i]["nombre"] . "</td>";
            echo "<td>" .  $usuarios[$i]["direccion"] . "</td>";
            echo "<td>" .  $usuarios[$i]["telefono"] . "</td>";
            echo "<td class='casilla_acciones'>
                      <a class='enlace_editar' href='index.php?metodo=edit&id=" . $usuarios[$i]['id'] . "'>
                        <span class='material-symbols-outlined'> edit </span>
                      </a>
                      <a class='enlace_borrar' href='index.php?metodo=destroy&id=" . $usuarios[$i]['id'] . "'>
                        <span class='material-symbols-outlined' id=" . $usuarios[$i]['id'] . "> delete </span>
                      </a>  
                    </td>";
            echo "</tr>";
          }
        } else {
          echo "<tr> <td cold colspan='5'> No existen usuarios </td> </tr>";
        }
        ?>
      </tbody>
    </table>
  </main>
</body>

</html>