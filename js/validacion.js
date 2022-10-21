const formulario = document.getElementById("formulario");
const nombre_usuario = formulario.nombre_usuario;
const direccion_usuario = formulario.direccion_usuario;
const telefono_usuario = formulario.telefono_usuario;
const id_usuario = formulario.id_usuario;
const inputs = document.getElementsByTagName("input");
const expresiones = {
  nombre_usuario: /^[a-zA-Z]{3,20}$/,
  direccion_usuario: /^[a-zA-Z0-9_/,.\s]{4,20}$/,
  telefono_usuario: /^[6|7|9]([0-9]{8})$/,
};
const validaciones = {
  nombre_usuario: false,
  direccion_usuario: false,
  telefono_usuario: false,
};

formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  enviarFormulario(e);
});

function enviarFormulario(e) {
  let contador = 0;
  for (let key in validaciones) {
    if (validaciones[key] === true) {
      contador++;
    }
  }
  if (contador === 3) {
    if (
      formulario.classList.contains("insertar") ||
      formulario.classList.contains("actualizar")
    ) {
      formulario.submit();
    }
  } else {
    let contenedores = document.querySelectorAll("#formulario div");
    contenedores.forEach((element) => {
      let contenedor = element.classList[0];
      for (let iterator in validaciones) {
        if (validaciones[iterator] === false) {
          let cadena = "contenedor" + iterator.replace("_", "").split(" ");
          if (cadena === contenedor.toLocaleLowerCase()) {
            element.classList.remove("ocultar");
          }
        }
      }
    });
  }
}

function asignarEventosInputs() {
  if (!window.location.href.includes("edit")) {
    limpiarInputs();
  }
  comprobarUrl();
  for (let index = 0; index < inputs.length; index++) {
    if (inputs[index].type === "text") {
      inputs[index].addEventListener("blur", validarFormulario);
      inputs[index].addEventListener("keyup", validarFormulario);
    }
  }
}

function validarFormulario(e) {
  switch (e.target.id) {
    case "nombre_usuario":
      validarCampo(
        nombre_usuario.value,
        expresiones.nombre_usuario,
        "error_usuario",
        "nombre_usuario"
      );
      break;
    case "direccion_usuario":
      validarCampo(
        direccion_usuario.value,
        expresiones.direccion_usuario,
        "error_direccion",
        "direccion_usuario"
      );
      break;
    case "telefono_usuario":
      validarCampo(
        telefono_usuario.value,
        expresiones.telefono_usuario,
        "error_telefono",
        "telefono_usuario"
      );
      break;
    default:
      break;
  }
}

function validarCampo(valor, expresion, textoSpan, nombre) {
  let contenedorSpan = document.getElementById(textoSpan).parentNode;
  if (!expresion.test(valor)) {
    contenedorSpan.classList.remove("ocultar");
    validaciones[nombre] = false;
  } else {
    contenedorSpan.classList.add("ocultar");
    validaciones[nombre] = true;
  }
}

function comprobarUrl() {
  let location = window.location.href;
  if (location.includes("edit")) {
    for (let iterator in validaciones) {
      if (validaciones[iterator] === false) {
        validaciones[iterator] = true;
      }
    }
  } else {
    return;
  }
}

function limpiarInputs() {
  nombre_usuario.value = "";
  direccion_usuario.value = "";
  telefono_usuario.value = "";
}

asignarEventosInputs();
