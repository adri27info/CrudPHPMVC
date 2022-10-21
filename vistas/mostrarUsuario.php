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
        <h1>Mostrar usuario</h1>
    </header>
    <br>
    <main>
        <div class="contenedorDataUsuario">
            <ul>
                <li><?php echo $usuario[0]["id"]; ?></li>
                <li><?php echo $usuario[0]["nombre"]; ?></li>
                <li><?php echo $usuario[0]["direccion"]; ?></li>
                <li><?php echo $usuario[0]["telefono"]; ?></li>
            </ul>
        </div><br>
        <div class="atras">
            <a href="index.php">Volver atras</a>
        </div><br>
    </main>
</body>

</html>