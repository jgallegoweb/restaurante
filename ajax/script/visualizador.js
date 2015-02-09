var REST_PAGINAACTUAL=0;

$(document).ready(init);

function init(){
    $(".cerrar-ventana").on("click", function(){
        cerrarVentana();
    });
    $("#btn-confirmar").on("click", llamadaPlatos);
    document.getElementById('archivos').addEventListener('change', handleFileSelect, false);
    $("#btn-insertar").on("click", function(){
        mostrarPanelVacio();
    })
    $("#btn-login").on("click", procesarLogin);
    $("#btn-salir").on("click", procesarSalir);
    procesarLogin();
    
}
function procesarSalir(){
    $.ajax({
        url: '../ajax/logout.php',
        type: 'GET',
        success: function(datos){
            portero(datos);
            //alert(datos);
        },
        error: function (){
            alert("adios");
        }
    });
}
function procesarLogin(){
    $.ajax({
        url: '../ajax/login.php',
        type: 'POST',
        data: 'login='+$("#login").val()+'&clave='+$("#clave").val(),
        success: function(datos){
            portero(datos);
            //alert(datos);
        },
        error: function (){
            alert("adios");
        }
    });
    
}
function portero(datos){
    //alert(datos.estado);
    if(datos.estado == "logueado"){
        cargarPlatos(REST_PAGINAACTUAL);
        cerrarLogin();
    }else if(datos.estado == "noclave"){
        $("#clave").next().text("Clave incorrecta");
        $("#login").next().text("");
    }else if(datos.estado == "noexiste"){
        $("#clave").next().text("");
        $("#login").next().text("Usuario incorrecto");
    }else if(datos.estado == "logout"){
        $("#tabla").remove();
        $(".paginacion").remove();
        mostrarLogin();
    }
}
function cargarPlatos() {
    $.ajax({
        url: '../ajax/selectPlatos.php',
        type: 'POST',
        data: 'pagina='+REST_PAGINAACTUAL,
        success: function(datos){
            mostrarTabla(datos);
        },
        error: function (){
            alert("adios");
        }
    });
}
function mostrarTabla(datos) {
    var tabla = $("#tabla");
    tabla.empty();
    $("<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Editar</th><th>Borar</th></tr>").appendTo(tabla);
    for (var i = 0 in datos.platos) {
        var fila = $("<tr><td>" + datos.platos[i].nombre + "</td><td>" + datos.platos[i].descripcion + "</td><td>" + datos.platos[i].precio + "</td><td><a class='enlace-modificar' data-id='"+datos.platos[i].id+"'>Editar</a></td><td><a class='enlace-eliminar' data-id='"+datos.platos[i].id+"' data-nombre='"+datos.platos[i].nombre+"'>Borrar</a></td>");
        tabla.append(fila);
    }
    $(".paginacion").remove();
    var tr = document.createElement("div");
    var td = document.createElement("div");
    /*td.setAttribute("colspan", 5);*/
    td.classList.add("paginacion");
    td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.inicio + "'>&lt;&lt;</a> ";
    td.innerHTML += "<a class='enlace' data-href='" + datos.paginas.anterior + "'>&lt;</a> ";
    if (datos.paginas.primero !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.primero + "'>" + (parseInt(datos.paginas.primero) + 1) + "</a> ";
    if (datos.paginas.segundo !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.segundo + "'>" + (parseInt(datos.paginas.segundo) + 1) + "</a> ";
    if (datos.paginas.actual !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.actual + "'>" + (parseInt(datos.paginas.actual) + 1) + "</a> ";
    if (datos.paginas.cuarto !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.cuarto + "'>" + (parseInt(datos.paginas.cuarto) + 1) + "</a> ";
    if (datos.paginas.quinto !== -1)
        td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.quinto + "'>" + (parseInt(datos.paginas.quinto) + 1) + "</a> ";
    td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.siguiente + "'>&gt;</a> ";
    td.innerHTML += "<a  class='enlace' data-href='" + datos.paginas.ultimo + "'>&gt;&gt;</a> ";
    tr.appendChild(td);
    
    tabla.after(tr);
    $(".enlace").unbind("click");
    $(".enlace").on("click", cambiarPagina);
    $(".enlace-modificar").unbind("click");
    $(".enlace-modificar").on("click", recogerPlato);
    $("enlace-eliminar").unbind("click");
    $(".enlace-eliminar").on("click", function(){
        mostrarConfirm($(this));
    });
}
function cambiarPagina(){
    REST_PAGINAACTUAL = $(this).data("href");
    cargarPlatos();
}
function recogerPlato(){
    $.ajax({
        url: '../ajax/selectPlato.php',
        type: 'POST',
        data: 'id='+$(this).data("id"),
        beforeSend: function(){
            $("#img-carga").removeClass("oculto");
        },
        complete: function(){
            $("#img-carga").addClass("oculto");
        },
        success: function(datos){
            mostrarPanel(datos);
        },
        error: function (){
            alert("adios");
        }
    });
    
}

function modificarPlatos(){
    if($(".minifoto").length<3){
        return false;
    }
    datosform = new FormData($("#formulario")[0]);
    $.ajax({
        url: '../ajax/updatePlato.php',
        type: 'POST',
        data: datosform,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $("#img-carga").removeClass("oculto");
        },
        complete: function(){
            $("#img-carga").addClass("oculto");
        },
        success: function(datos){
            cargarPlatos();
            
            cerrarVentana();
        },
        error: function (datos){
            alert("fallo");
        }
    });
}
function insertarPlato() {
    /*var imagenes = document.getElementById("archivos");
    imagenes = imagenes.files.length;*/
    imagenes = $(".minifoto").length;
    if(imagenes<3){
        alert("minimo de fotos: 3");
        return false;
    }
    datosform = new FormData($("#formulario")[0]);
    alert(imagenes);
    $.ajax({
        url: '../ajax/insertPlato.php',
        type: 'POST',
        data: datosform,
        /*async: false,*/
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $("#img-carga").removeClass("oculto");
        },
        complete: function(){
            $("#img-carga").addClass("oculto");
        },
        success: function (datos) {
            cargarPlatos();
            cerrarVentana();
        },
        error: function (e, a) {
            alert(a);
        }
    });
}
function llamadaPlatos(){
    if($("#in-id").val()==""){
        insertarPlato();
    }else{
        modificarPlatos();       
    }
}

function borrarPlato(x){
    alert(x.data("nombre"));
    $.ajax({
        url: '../ajax/deletePlato.php',
        type: 'POST',
        data: 'id='+x.data("id"),
        beforeSend: function(){
            $("#img-carga").removeClass("oculto");
        },
        complete: function(){
            $("#img-carga").addClass("oculto");
        },
        success: function(datos){
            cargarPlatos();
            alert(datos.error);
        },
        error: function (){
            alert("adios");
        }
    });
}
function borrarFoto(){
    alert("ok");
    $.ajax({
        url: '../ajax/deleteFoto.php',
        type: 'POST',
        data: 'idplato='+$(this).data("idplato")+'&nombre='+$(this).data("nombre"),
        beforeSend: function(){
            $("#img-carga").removeClass("oculto");
        },
        complete: function(){
            $("#img-carga").addClass("oculto");
        },
        success: function(datos){
            cargarPlatos();
            alert(datos.error);
        },
        error: function (){
            alert("adios");
        }
    });
}

/*************************************************************************************************************
****************************************** gestion de ventanas ***********************************************
*************************************************************************************************************/

function cerrarVentana(){
    $("#superposicion").addClass("oculto");
    $("#in-id").val("");
    $("#in-nombre").val("");
    $("#in-descripcion").val("");
    $("#in-precio").val("");
    $("#panel-gestion").addClass("borrado");
    $("#mensaje-confirm").text("");
    $("#confirmacion").addClass("borrado");
    var archivador = $('#archivos');
    archivador.replaceWith(archivador.clone(true)); 
    document.getElementById('archivos').addEventListener('change', handleFileSelect, false);
    $("#list").empty();
    $("#galeria").empty();
}

function mostrarConfirm(x){
    $("#mensaje-confirm").text("¿Desea borrar '"+x.data("nombre")+"' y sus fotos");  
    $("#superposicion").removeClass("oculto");
    $("#confirmacion").removeClass("borrado");
    $("#btn-ok").unbind("click");
    $("#btn-ok").on("click", function(){
        borrarPlato(x);
        cerrarVentana();
    });
}
function cerrarConfirm(){
    $("#mensaje-confirm").text("");  
    $("#superposicion").addClass("oculto");
    $("#panel-gestion").removeClass("borrado");
    $("#confirmacion").addClass("borrado");
}
function mostrarPanel(datos){
    if(datos.id==""){
        alert("No se ha encontrado el plato solicitado, pruebe de nuevo");
        return;
    }
    $("#superposicion").removeClass("oculto");
    $("#panel-gestion").removeClass("borrado");
    $("#in-id").val(datos.id);
    $("#in-nombre").val(datos.nombre);
    $("#in-descripcion").val(datos.descripcion);
    $("#in-precio").val(datos.precio);
    for(var i=0; i<datos.fotos.length; i++){
        $("#galeria").append($("<img src='../imagenes/"+datos.fotos[i]+"' data-idplato='"+datos.id+"' data-nombre='"+datos.fotos[i]+"' class='minifoto'>"));
    }
    $(".minifoto").unbind("click");
    $(".minifoto").on("click", borrarFoto);
}
function mostrarPanelVacio(){
    $("#superposicion").removeClass("oculto");
    $("#panel-gestion").removeClass("borrado");
}
function cerrarLogin(){
    $("#login").text("");  
    $("#clave").text("");
    $("#formulario-login").addClass("borrado");
    $("#clave").next().text("");
    $("#login").next().text("");
    $("#superposicion").addClass("oculto");
    $("#btn-salir").removeClass("oculto");
}
function mostrarLogin(){
    $("#login").text("");  
    $("#clave").text("");
    $("#formulario-login").removeClass("borrado");
    $("#clave").next().text("");
    $("#login").next().text("");
    $("#superposicion").removeClass("oculto");
     $("#btn-salir").addClass("oculto");
}
function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    document.getElementById('list').innerHTML = "";
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="minifoto" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

 