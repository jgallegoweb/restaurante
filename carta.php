<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IABLE restaurante</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/codigo.js"></script>
    <script src="ajax/script/visualizadorfront.js"></script>
</head>
<body>
    <div id="contenedor">
        <div id="inicio">
            
            <header>
                <div id="logo-portada">
                    <img src="img/logo2.png">
                </div>
                <div id="resto-header"></div>
                <nav>
                    <ul>
                        <li class="menu">
                            <a href="#inicio" class="menu-enlace">
                                <div class="icono"><img src="img/casa.png"></div>
                                <div class="opcion">INICIO</div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="#cocina" class="menu-enlace">
                                <div class="icono"><img src="img/menumenu.png"></div>
                                <div class="opcion">CARTA</div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="#llegar" class="menu-enlace">
                                <div class="icono"><img src="img/locali.png"></div>
                                <div class="opcion">LLEGAR</div>
                            </a>
                        </li>
                        <li class="menu">
                            <a href="#contacto" class="menu-enlace">
                                <div class="icono"><img src="img/telmenu.png"></div>
                                <div class="opcion">CONTACTO</div>
                            
                            </a>
                        </li>
                    </ul>
                    
                </nav>
                <div id="menu-movil">
                        <div id="boton-js" class="menu-cerrado"></div>
                    </div>
            </header>
            <div class="espacio-foto"></div>
        </div>
        <h1 class="titulo-seccion">Nuestros platos</h1>
            <p class="parrafo-centrado">
                La carta del IABLE tiene 36 platos entre entrantes, platos principales y postres. Estos platos se mantienen actualizados y se renuevan cada año. Aquí te mostramos una selección de los 8 platos mejor valorados de este año en nuestro restaurante.
            </p>
        <section id="platos">
            
            <div id="galeria-platos">
                
            </div>
            <div class="paginacion"></div>
        </section>
        <section id="pie">
            <p class="parrafo-centrado blanco">Restaurante IABLE &reg es una marca registrada.</p>
        </section>
    </div>
</body>
</html>