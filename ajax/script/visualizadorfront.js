REST_PAGINAACTUAL = 0;

$(document).ready(init);

function init(){
    cargarFront();
}

function cargarFront(){
    $.ajax({
        url: 'ajax/selectPlatos.php',
        type: 'POST',
        data: 'pagina='+REST_PAGINAACTUAL,
        success: function(datos){
            mostrarGaleria(datos);
        },
        error: function (){
            alert("adios");
        }
    });
}

function mostrarGaleria(datos){
    var galeria = $("#galeria-platos");
    galeria.empty();
    for (var i=0 in datos.platos) {
        $("<div class='plato-principal plato1'><div class='foto-plato' style='background-image: url(imagenes/"+datos.platos[i].fotos[0]+")'></div><div class='info-plato'><h3>"+datos.platos[i].nombre+"</h3><p>"+datos.platos[i].descripcion+" a un precio de "+datos.platos[i].precio+"€</p></div></div>").appendTo(galeria);
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
    
    galeria.after(tr);
    
    $(".enlace").unbind("click");
    $(".enlace").on("click", cambiarPagina);
}
function cambiarPagina(){
    REST_PAGINAACTUAL = $(this).data("href");
    cargarFront();
}
