window.addEventListener("load", function(){
    var pos = new google.maps.LatLng(37.176817, -3.589867);
    var mapaconfig = {
            zoom: 10,
            center: new google.maps.LatLng(37.176817, -3.589867),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    mapa = new google.maps.Map(document.getElementById('mapa'), mapaconfig);
    var marker = new google.maps.Marker({
        position: pos,
        title:"Hello World!"
    });
    marker.setMap(mapa);
    var boton = document.getElementById("boton-js");
    var menu = document.querySelector("nav ul");
    boton.addEventListener("click", function(){
        this.classList.toggle("menu-abierto");
        menu.classList.toggle("abrir");
    });       
    
});