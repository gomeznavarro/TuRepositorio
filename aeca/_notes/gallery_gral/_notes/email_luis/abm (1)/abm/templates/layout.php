<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset="iso-8859-1" />-->
<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />

    <title>Edici&oacute;n de Galer&iacute;a</title>

    <!-- incluyo la libreria jQuery -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js" charset="utf-8"></script>
    <!-- incluyo el archivo que tiene mis funciones javascript -->
    <script type="text/javascript" src="resources/functions.js" charset="utf-8"></script>
    <!-- incluyo el framework css , blueprint. -->
    <link rel="stylesheet" type="text/css" href="resources/screen.css" charset="utf-8" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" charset="utf-8"/>
</head>
<body>
    <div id ="block"></div>
    <div class="container">
        <h1 class="title">Edici&oacute;n de Galer&iacute;a de Fotos</h1>
        <div id="popupbox"></div>
        <div id="content">
            <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
        </div>
    </div>
</body>
</html>