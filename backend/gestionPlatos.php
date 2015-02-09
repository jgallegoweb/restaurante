<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="../css/estilosback.css"/>
    </head>
    <body>
        
        <a id="btn-insertar">Insertar nuevo</a>
        <table id="tabla">
            
        </table>
        <a id="btn-salir" class="oculto">Cerrar sesión</a>
        <!-- ocultos -->
        
        <img id="img-carga" src="../img/loading.gif" class="oculto">
        <div id="superposicion" >
            <!--class="oculto"-->
            <div id="formulario-login">
                <input type="text" id="login" placeholder="Usuario"><span></span><br/>
                <input type="text" id="clave" placeholder="Contraseña"><span></span><br/>
                <a id="btn-login">Login</a>
            </div>
            <div id="panel-gestion" class="borrado">
                <div class="cerrar-ventana">X</div>
                <form id="formulario" action="../ajax/insertPlato.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="in-id" value=""/>
                    <input type="text" name="nombre" id="in-nombre" value="" /><br/>
                    <textarea name="descripcion" id="in-descripcion" rows="4" cols="20"></textarea><br/>
                    <input type="text" name="precio" id="in-precio" value="" /><br/>
                    <input type="file" name="archivos[]" id="archivos" multiple><br/>
                    <output id="list"></output>
                    <input type="submit" value="ss" />
                </form>
                <div id="galeria"></div>
                <a id="btn-cancelar" class="cerrar-ventana">Cancelar</a><a id="btn-confirmar">Confirmar</a>
            </div>
            <div id="confirmacion" class="borrado">
                <div id="mensaje-confirm"></div>
                <a id="btn-no" class="cerrar-ventana">Cancelar</a><a id="btn-ok">Confirmar</a>
            </div>
        </div>
        <script src="../js/jquery-2.1.3.min.js"></script>
        <script src="../ajax/script/visualizador.js"></script>
    </body>
</html>