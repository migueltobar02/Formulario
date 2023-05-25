const form = document.getElementById("mi-formulario");
const preguntasDiv = document.getElementById("preguntas");
const agregarPreguntaButton = document.getElementById("agregar-pregunta");
const eliminarPreguntaButton = document.getElementById("eliminar-pregunta");
eliminarPreguntaButton.style.display = "none";

let preguntaCount = 2;
document.getElementById("contador").value = preguntaCount;

agregarPreguntaButton.addEventListener("click", function () {
  preguntaCount++;
  const fieldset = document.createElement("fieldset");
  fieldset.innerHTML = `
    <legend>Pregunta ${preguntaCount}</legend>
    <label for="pregunta-${preguntaCount}">Pregunta:</label>
    <textarea id="mi-textarea" name="pregunta${preguntaCount}" rows="20" cols="50" style="width: 100%; height: 60px;"  placeholder="Inserte pregunta" required ></textarea>
    <br>
    <label for="respuesta-${preguntaCount}">Respuesta:</label>
    <label for="respuesta${preguntaCount}_v">
        <input type="radio" value="verdadero" name="respuesta${preguntaCount}" id="respuesta${preguntaCount}_v"required >Verdadero
    </label>
    <label for="respuesta${preguntaCount}_f">
        <input type="radio" value="falso" name="respuesta${preguntaCount}" id="respuesta${preguntaCount}_f"required >Falso
    </label>
  `;

  preguntasDiv.appendChild(fieldset);
  document.getElementById("contador").value = preguntaCount;

  if (preguntaCount > 2) {
    eliminarPreguntaButton.style.display = "inline-block";
  }
});

eliminarPreguntaButton.addEventListener("click", function () {
  if (preguntaCount > 2) {
    preguntasDiv.removeChild(preguntasDiv.lastChild);
    preguntaCount--;
    document.getElementById("contador").value = preguntaCount;

    if (preguntaCount <= 2) {
      eliminarPreguntaButton.style.display = "none";
    }
  }
});
