<?php

require_once("modelo/modelo.php");

class Controlador
{

    //GET
    static function index()
    {
        $modelo = new Modelo();
        $usuarios = $modelo->mostrarUsuarios();
        require_once("vistas/mostrarUsuarios.php");
    }

    //GET
    static function create()
    {
        require_once("vistas/insertarUsuario.php");
    }

    //POST
    static function store()
    {
        if (isset(($_REQUEST["nombre_usuario"])) &&  isset(($_REQUEST["direccion_usuario"])) &&  isset(($_REQUEST["telefono_usuario"]))) {
            if (!empty($_REQUEST["nombre_usuario"]) && !empty($_REQUEST["direccion_usuario"]) && !empty($_REQUEST["telefono_usuario"])) {
                $modelo = new Modelo();
                $usuarioInsertado = $modelo->registrarUsuario(0, $_REQUEST["nombre_usuario"], $_REQUEST["direccion_usuario"], $_REQUEST["telefono_usuario"]);
                $mensaje = "";
                if ($usuarioInsertado != 0) {
                    $mensaje = "insertado";
                } else {
                    $mensaje = "no insertado";
                }
                header("Location: index.php?mensaje=$mensaje&usuario=" . $_REQUEST['nombre_usuario'] . "");
            }
        }
    }

    //GET
    static function show($id)
    {
        $modelo = new Modelo();
        $usuario = $modelo->mostrarUsuario($id);
        require_once("vistas/mostrarUsuario.php");
    }

    //GET
    static function edit($id)
    {
        $modelo = new Modelo();
        $usuario = $modelo->mostrarUsuario($id);
        require_once("vistas/actualizarUsuario.php");
    }

    //PUT/PATCH
    static function update($id)
    {
        if (isset(($_REQUEST["id_usuario"])) && isset(($_REQUEST["nombre_usuario"])) &&  isset(($_REQUEST["direccion_usuario"])) &&  isset(($_REQUEST["telefono_usuario"]))) {
            if (!empty($_REQUEST["id_usuario"]) && !empty($_REQUEST["nombre_usuario"]) && !empty($_REQUEST["direccion_usuario"]) && !empty($_REQUEST["telefono_usuario"])) {
                $modelo = new Modelo();
                $usuarioActualizado = $modelo->updateUsuario($id, $_POST["nombre_usuario"], $_POST["direccion_usuario"], $_POST["telefono_usuario"]);
                $mensaje = "";
                if ($usuarioActualizado !== 0 || $usuarioActualizado === 0) {
                    $mensaje = "actualizado";
                }
                header("Location: index.php?mensaje=$mensaje&usuario=" . $_REQUEST['nombre_usuario'] . "");
            }
        }
    }

    //DELETE
    static function destroy($id)
    {
        $modelo = new Modelo();
        $nombreUsuario = $modelo->mostrarUsuario($id);
        $usuarioBorrado = $modelo->borrarUsuario($id);
        $mensaje = "";
        if ($usuarioBorrado != 0) {
            $mensaje = "borrado";
        } else {
            $mensaje = "no borrado";
        }
        header("Location: index.php?mensaje=$mensaje&usuario=" . $nombreUsuario[0]["nombre"] . "");
    }

    static function exitConnection()
    {
        $modelo = new Modelo();
        $modelo->closeConnection();
    }
}
