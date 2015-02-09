<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IABLE restaurante</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="js/codigo.js"></script>
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
        <section id="chefs">
            <a name="cocina"></a>
            <h1 class="titulo-seccion">Chefs</h1>
            <p class="parrafo-centrado">
                Nuestros cocineros son expertos en lo que hacen, por eso cada uno tiene su funcion bien diferenciada en la cocina y no interfieren entre ellos. Sin embargo, a ellos le gusta crear cosas nuevas juntos recogiendo lo mejor de cada uno.
            </p>
            <div id="cocineros">
                <div class="cocinero cuno">
                    <h1 class="titulo-cocinero">Repostería</h1>
                    <img class="icono-cocinero" src="img/whisk.png">
                    <p class="parrafo-cocinero">
                        Francisco Medina nació en Extremadura pero se crió y reside en Dénia, Alicante. Fue en esta ciudad levantina donde comenzó sus orígenes gastronómicos y donde descubrió que la cocina no es solo crear platos sino que se trata de transmitir experiencias.
                    </p>
                    <img class="foto-cocinero" src="img/chef1.png">
                    <p class="cita-cocinero">"La vida es como una caja de bombones"</p>
                    <h2 class="firma-uno">Francisco Medina</h2>
                </div>
                <div class="cocinero cdos">
                    <h1 class="titulo-cocinero">Cocina oriental</h1>
                    <img class="foto-cocinero" src="img/chef2.png">
                    <p class="parrafo-cocinero">
                        A Chin Lú se le considera un artista de la cocina, en la que ha introducido nuevas técnicas, como la deconstrucción sacando éste concepto del mundo del arte, las espumas (que crea utilizando sifones), la esferificación (empleo de alginatos para formar pequeñas bolas de contenido líquido) así como el empleo de nitrógeno líquido.
                    </p>
                    <img class="icono-cocinero" src="img/chinese13.png">
                    <p class="cita-cocinero">"Ven a probar mis platos en IABLE"</p>
                    <h2 class="firma-dos">Chin Lú <span class="firma-uno">^</span></h2>
                </div>
                <div class="cocinero ctres">
                    <h1 class="titulo-cocinero">Cocina tradicional</h1>
                    <img class="icono-cocinero" src="img/fork26.png">
                    <p class="parrafo-cocinero">
                        Alberto Alarcón es malagueño, su origen andaluz hizo que sus primeros pasos como cocinero se centraran en recetas típicas de su tierra. Esta línea cambio cuando comenzó a trabajar en otras cocinas donde se alimentó de los platos vascos.
                    </p>
                    <img class="foto-cocinero" src="img/sdss.png">
                    <p class="cita-cocinero">"Comida típica de nuestra tierra, un poco diferente"</p>
                    <h2 class="firma-tres">Alarcón</h2>
                </div>
            </div>
        </section>
        <section id="productos">
            <h1 class="titulo-seccion">Productos</h1>
            <h2 class="subtitulo-seccion">Naturales y nacionales</h2>
            <img class="foto-productos" src="img/aceituna.png">
            <p class="parrafo-centrado">
                Nuestros chefs solo utilizan productos de la mejor calidad y de la tierra como es el caso del aceite de oliva andaluz o el jamón de Huelva.

            </p>
            <p class="parrafo-centrado">
                El aceite de oliva virgen andaluz con Denominación de Origen es obtenido del fruto del olivo por procedimientos mecánicos o por otros medios físicos que no producen alteración del aceite, conservando el aroma, sabor y características de la oliva. La Denominación de Origen del Jamón de Huelva asegura que éste procede del cerdo alimentado según las normas reglamentarias y pertenece exclusivamente a explotaciones y ganaderías inscritas y controladas por el Consejo Regulador.
            </p>
            <h2 class="subtitulo-seccion naranja">La mejor selección de vinos</h2>
            <img class="foto-productos" src="img/vinos.png">
            <p class="parrafo-centrado">
                En Málaga, la Denominación de Origen sólo protege a los vinos cuyas uvas se recogen en la provincia y que han pasado por las soleras-criaderas del término municipal que lleva su nombre. Son los vinos Málaga Dulce, Lágrima y Pedro Ximénez.
            </p>
            <p class="parrafo-centrado">
                Los vinos del sur de la provincia de Córdoba son de tal calidad que su Denominación de Origenes indiscutible. Los más significativos son los finos, los amontillados, los olorosos, los Palo Cortado, los Raya, los Pedro Ximénez y los Moscatel. Los amparados por el Consejo Regulador son los criados en la zona de Montilla-Moriles.
            </p>
        </section>
        <h1 class="titulo-seccion">Nuestros platos</h1>
            <p class="parrafo-centrado">
                La carta del IABLE tiene 36 platos entre entrantes, platos principales y postres. Estos platos se mantienen actualizados y se renuevan cada año. Aquí te mostramos una selección de los 8 platos mejor valorados de este año en nuestro restaurante.
            </p>
        <section id="platos">
            
            <div id="galeria-platos">
                <div class="plato-principal plato1">
                    <div class="foto-plato"></div>
                    <div class="info-plato">
                        <h3>Rabo de toro</h3>
                        <p>Rabo de toro al vino tinto de Navarra con puré de coliflor y sus verduritas</p>
                    </div>
                </div>
                <div class="plato-principal plato2">
                    <div class="foto-plato"></div>
                    <div class="info-plato">
                        <h3>Ternera Tataki</h3>
                        <p>Solomillo Ternera Tataki con salsa de Jengibre acompañado de verduras variadas</p>
                    </div>
                </div>

                <div class="plato-principal plato3">
                    <div class="foto-plato"></div>
                    <div class="info-plato">
                        <h3>Primavera</h3>
                        <p>Espárragos con espuma de su agua, y trufa negra</p>
                    </div>
                </div>

                <div class="plato-principal plato4">
                    <div class="foto-plato"></div>
                    <div class="info-plato">
                        <h3>Katashimi</h3>
                        <p>Variedad de sushi con bonito del cantabrico y especies del lugar</p>
                    </div>
                </div>
                <div class="plato-principal plato5">
                    <div class="foto-plato"></div>
                    <div class="info-plato">
                        <h3>Tempura</h3>
                        <p>Tempura de verduras de temporada con “KAKIAGE”</p>
                    </div>
                </div>

                <div class="plato-principal plato6">
                    <div class="foto-plato"></div>
                    <div class="info-plato">
                        <h3>Espárragos</h3>
                        <p>Bola de espárragos liquidos con menta</p>
                    </div>
                </div>

                <div class="plato-principal plato7">
                    <div class="foto-plato"></div>
                    <div class="info-plato">
                        <h3>Tasakiti</h3>
                        <p>Puente de rollitos Tasakiti sobre rio de crema de uva</p>
                    </div>
                </div>

                <div class="plato-principal plato8">
                    <div class="foto-plato"></div>
                    <div class="info-plato">
                        <h3>Nigiri</h3>
                        <p>Nigiri de salmón al soplete con aroma de salsa de ostras</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="localizacion">
            <a name="llegar"></a>
            <h1 class="titulo-seccion">Encuéntranos</h1>
            <div id="mapa">

            </div>

            <div id="localizador">
                <div class="centrado-input">
                    <div id="direccion">Calle Carril del Picón, nº14 Granada, 18013 (España)</div>
                    <div id="buscador">
                        <input type="text" id="campo-mapa" placeholder="Ver desde mi dirección">
                        <input type="button" id="buscar" value="OK">
                    </div>
                </div>
            </div>

        </section>
        <section id="contacto">
            <a name="contacto"></a>
            <h1 class="titulo-seccion">Contacto</h1>
            <div id="centrado-contacto">
                <div class="forma-contacto">
                    <div class="datos-contacto">
                        <img src="img/tel.png"> <div class="dato-contacto">963.852.741</div>
                    </div>
                    <div class="datos-contacto">
                        <img src="img/correo.png">
                        <div class="dato-contacto">info@iable.es</div>
                    </div>
                </div>
                <div class="forma-contacto">
                    <div class="datos-contacto">
                        <div class="dato-contacto">Restaurante IABLE</div> <img src="img/facebook.png"> 
                    </div>
                    <div class="datos-contacto">
                        <div class="dato-contacto">@IABLEcocina</div> <img src="img/twitter.png"> 
                    </div>
                    <!--div class="datos-contacto">
                        <div class="dato-contacto">IABLEpics</div> <img src="img/pick.png"> 
                    </div-->
                    <div class="datos-contacto">
                        <div class="dato-contacto">IABLE videos</div> <img src="img/youtube.png"> 
                    </div>
                </div>
            </div>
            <div class="forma-contacto"></div>
        </section>
        <section id="pie">
            <p class="parrafo-centrado blanco">Restaurante IABLE &reg es una marca registrada.</p>
        </section>
    </div>
</body>
</html>