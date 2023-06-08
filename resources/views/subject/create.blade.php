<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Materia</title>
</head>
<body>
    <form action={{route("subjects.store")}} method="post">
        @csrf 
        <b>Datos de Materia</b> <br>

        Nombre: <input type="text" name='name' placeholder="Nombre de Materia"><br>

        <hr>
       <b>Configuración</b> <br>
        Día: <select name="day" >
            <option value="2">Lunes</option><br>
            <option value="3">Martes</option><br>
            <option value="4">Miércoles</option><br>
            <option value="5">Jueves</option><br>
            <option value="6">Viernes</option><br>
        </select><br>
        Hora de inicio: <input type="time" name="start"><br>
        Hora de Fin: <input type="time" name="finish"><br>
        Rango: <input type="time" name="stop">
        *el <b>Rango</b> es el tiempo de tope para marcar una asistencia
        <br>
       
        <input type="submit" value="Guardar">
    </form>
</body>
</html>