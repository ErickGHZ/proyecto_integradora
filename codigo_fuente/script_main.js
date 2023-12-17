  function redirectToPage() {
    window.location.href = "main2.html";
  }
  function clearPlaceholder(input) {
    input.placeholder = '';
  }
  function toggleMenu() {
    var menuContent = document.getElementById("menuContent");
    var dropdown = document.querySelector(".dropdown");
    dropdown.classList.toggle("active");
  }


 //Funcion para eliminar datos
  let filaSeleccionada = null;



  function seleccionarFilaCarrera(fila, idCarrera) {
    console.log("Seleccionando fila de profesor con ID:", idCarrera);
    if (filaSeleccionada !== null) {
        filaSeleccionada.classList.remove("seleccionada");
        
    }
    filaSeleccionada = fila;
    filaSeleccionada.classList.add("seleccionada");
    document.getElementById("id_carrera_seleccionada").value = idCarrera;
}

function seleccionarFilaGrupo(fila, idGrupo) {
  if (filaSeleccionada !== null) {
      filaSeleccionada.classList.remove("seleccionada");
  }
  filaSeleccionada = fila;
  filaSeleccionada.classList.add("seleccionada");
  document.getElementById("id_grupo_seleccionada").value = idGrupo;
}



function seleccionarFilaMaterias(fila, idMateria) {
  if (filaSeleccionada !== null) {
      filaSeleccionada.classList.remove("seleccionada");
  }
  filaSeleccionada = fila;
  filaSeleccionada.classList.add("seleccionada");
  document.getElementById("id_materia_seleccionada").value = idMateria;
}

function seleccionarFilaProfesor(fila, idProfesor) {
  console.log("Seleccionando fila de profesor con ID:", idProfesor);
  if (filaSeleccionada !== null) {
      filaSeleccionada.classList.remove("seleccionada");
  }
  filaSeleccionada = fila;
  filaSeleccionada.classList.add("seleccionada");
  document.getElementById("id_profesor_seleccionada").value = idProfesor;
}

function seleccionarFilaGrupoMateriaProfesor(fila, idGrupoMateriaProfesor) {
  console.log("Seleccionando fila de profesor con ID:", idGrupoMateriaProfesor);
  if (filaSeleccionada !== null) {
      filaSeleccionada.classList.remove("seleccionada");
  }
  filaSeleccionada = fila;
  filaSeleccionada.classList.add("seleccionada");
  document.getElementById("id_grupo_materia_profesor_seleccionada").value = idGrupoMateriaProfesor;
}

                                  


  var isSelecting = false;
  var startCell = null;
  var endCell = null;

  function handleMouseDown(event) {
    var cell = event.target;
    if (cell.tagName === 'TD') {
      isSelecting = true;
      startCell = cell;
      endCell = cell;
      clearSelection();
      toggleSelection(startCell);
    }
  }

  function handleMouseOver(event) {
    var cell = event.target;
    if (isSelecting && cell.tagName === 'TD') {
      endCell = cell;
      clearSelection();
      selectRange(startCell, endCell);
    }
  }

  function handleMouseUp(event) {
    var cell = event.target;
    if (isSelecting && cell.tagName === 'TD') {
      endCell = cell;
      clearSelection();
      selectRange(startCell, endCell);
      isSelecting = false;
    }
  }

  function clearSelection() {
    var selectedCells = document.querySelectorAll('.selected');
    selectedCells.forEach(function(cell) {
      cell.classList.remove('selected');
    });
  }

  function selectRange(start, end) {
    var tableRows = Array.from(start.closest('table').querySelectorAll('tr'));
    var startRowIndex = tableRows.indexOf(start.parentNode);
    var endRowIndex = tableRows.indexOf(end.parentNode);
    if (startRowIndex > endRowIndex) {
      [startRowIndex, endRowIndex] = [endRowIndex, startRowIndex];
    }
    var startCellIndex = start.cellIndex;
    var endCellIndex = end.cellIndex;
    if (startCellIndex > endCellIndex) {
      [startCellIndex, endCellIndex] = [endCellIndex, startCellIndex];
    }
    for (var i = startRowIndex; i <= endRowIndex; i++) {
      var currentRow = tableRows[i];
      var rowCells = currentRow.querySelectorAll('td');
      for (var j = startCellIndex; j <= endCellIndex; j++) {
        var cell = rowCells[j];
        cell.classList.add('selected');
      }
    }
  }

  function paintSelectedCells() {
    var selectedCells = document.querySelectorAll('.selected');
    selectedCells.forEach(function(cell) {
      cell.classList.replace('occupied','available')
    });
  }

  function paintSelectedCells2() {
    var selectedCells = document.querySelectorAll('.selected');
    selectedCells.forEach(function(cell) {
      cell.classList.replace('available','occupied')
    });
  }









  function valorMaximo(input) {
    var numero = input.value;
    if (numero.length > 3) {
        input.value = numero.slice(0, 3);
    } else if (numero < 1 || numero > 200) {
        input.value = "";
    }
  }

  function valorMaximo1(input) {
    var numero = parseInt(input.value);
    if (isNaN(numero)) {
        input.value = ""; // Si no se puede convertir a un número, borra el campo
    } else if (numero < 1 || numero > 14) {
        input.value = ""; // Si está fuera del rango, borra el campo
    }
}


  function valorMaximoAlumnos(input) {
    var numero = input.value;
    if (numero.length > 2) {
        input.value = numero.slice(0, 2);
    } else if (numero < 1 || numero > 99) {
        input.value = "";
    }
}

function valorMaximoAulas(input) {
  var numero = input.value;
  if (numero.length > 3) {
      input.value = numero.slice(0, 3);
  } else if (numero < 1 || numero > 100) {
      input.value = "";
  }
}


var disponiblesInput;

function showAvailableCells() {
  var availableCells = document.querySelectorAll(".available");
  var availableData = [];

  // Obtener los IDs y nombres de las celdas disponibles
  for (var i = 0; i < availableCells.length; i++) {
    var cellId = availableCells[i].id;
    var cellNombre = availableCells[i].dataset.nombre; // Suponiendo que el nombre se encuentra en un atributo de datos llamado 'data-nombre'
    
    var cellData = {
      id: cellId,
      nombre: cellNombre
    };

    availableData.push(cellData);
  }

  console.log(availableData); // Agrega esta línea para verificar los datos


  // Si ya existe un input, eliminarlo antes de crear uno nuevo
  if (disponiblesInput) {
    document.getElementById("profesor-seleccionado").removeChild(disponiblesInput);
  }

  // Mostrar los IDs de las celdas disponibles en un input no modificable
  disponiblesInput = document.createElement("input");
  disponiblesInput.type = "hidden";
  
  // Formatear los IDs en una cadena legible
  var formattedData = availableData.map(cell => cell.id).join(",");
  disponiblesInput.value = formattedData;
  disponiblesInput.readOnly = true;
  disponiblesInput.id = "horas_disponibles"; // Establecer un ID único para el nuevo input
  disponiblesInput.name = "horas_disponibles"; // Establecer el nombre del input como "horas_disponibles_hidden"

  document.getElementById("profesor-seleccionado").appendChild(disponiblesInput);
}






var idGrupoMateriaProfesorGlobal = null;

function seleccionarFilaGrupoMateriaProfesor(fila, idGrupoMateriaProfesor) {
    console.log("Seleccionando fila de GrupoMateria con ID:", idGrupoMateriaProfesor);
    if (filaSeleccionada !== null) {
        filaSeleccionada.classList.remove("seleccionada");
    }
    filaSeleccionada = fila;
    filaSeleccionada.classList.add("seleccionada");
    document.getElementById("id_GrupoMateriaProfesor_seleccionada").value = idGrupoMateriaProfesor;

    // Almacena el valor en la variable global

}




var idGrupoMateriaProfesorGlobal; // Definición global


function ejecutarPasos() {
  paintSelectedCells3(); // Primero cambia las clases
  setTimeout(guardarHorarios, 100); // Espera 100 milisegundos antes de llamar a guardarHorarios
}

function paintSelectedCells3() {
  var selectedCells = document.querySelectorAll('.selected');
  selectedCells.forEach(function(cell) {
      // Eliminar todas las clases existentes
      cell.className = '';
      
      // Agregar la clase idGrupoMateriaProfesorGlobal
      cell.classList.add(idGrupoMateriaProfesorGlobal);
  });
}

function guardarHorarios() {
  var tabla3 = document.getElementById("tabla3");
  var allCells = tabla3.querySelectorAll('td:not(.hora)');
  
  var datosHorarios = [];
  
  allCells.forEach(function(cell) {
      var idHoraHorario = cell.getAttribute('id').trim();
      var idGrupoMateriaProfesor = cell.className.trim();
      
      if (idHoraHorario !== '' && idGrupoMateriaProfesor !== '') {
          datosHorarios.push({
              idHoraHorario: idHoraHorario,
              idGrupoMateriaProfesor: idGrupoMateriaProfesor
          });
      }
  });

  var hiddenInput = document.createElement("input");
  hiddenInput.type = "hidden";
  hiddenInput.name = "datosHorarios";
  hiddenInput.value = JSON.stringify(datosHorarios);
  
  document.getElementById("formulario").appendChild(hiddenInput);
  
  document.getElementById("formulario").submit();
}



function ejecutarPasos2() {
  paintSelectedCells4(); // Primero cambia las clases
  setTimeout(guardarHorarios2); // Espera 100 milisegundos antes de llamar a guardarHorarios
}

function paintSelectedCells4() {
  var selectedCells = document.querySelectorAll('.selected');
  selectedCells.forEach(function(cell) {
      // Eliminar todas las clases existentes
      cell.className = '';
  });
}

function guardarHorarios2() {
  var tabla3 = document.getElementById("tabla3");
  var allCells = tabla3.querySelectorAll('td:not(.hora)');
  
  var datosHorarios = [];
  
  allCells.forEach(function(cell) {
      var idHoraHorario = cell.getAttribute('id').trim();
      var idGrupoMateriaProfesor = cell.className.trim();
      
      if (idHoraHorario !== '' && idGrupoMateriaProfesor !== '') {
          datosHorarios.push({
              idHoraHorario: idHoraHorario,
              idGrupoMateriaProfesor: idGrupoMateriaProfesor
          });
      }
  });

  var hiddenInput = document.createElement("input");
  hiddenInput.type = "hidden";
  hiddenInput.name = "datosHorarios";
  hiddenInput.value = JSON.stringify(datosHorarios);
  
  document.getElementById("formulario").appendChild(hiddenInput);
  
  document.getElementById("formulario").submit();
}
