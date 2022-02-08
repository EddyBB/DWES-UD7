<!DOCTYPE html>
<html>

<head>
    <title>Buscar Ciudades</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>

    <h1>Obtener Ciudades</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php?controller=ciudades&action=formulario" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='numHabitantes'>";
        print "<input type='submit' name='enviar' value='Enviar'>";
        print "<p class='error'>$error</p>";
        //print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        foreach ($resultado as $ciudad) {
            
            print($ciudad["nombre"]. "<br>");
            print($ciudad["numHabitantes"]. "<br><br>");
            
        }
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Eddy Alejandro González Chávez</a></div>
</body>

</html>