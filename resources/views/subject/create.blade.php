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
        Carrera:
        <select name="career" required>
            @foreach ($careers as $career)
                <option value="{{$career->id}}">{{$career->name}}</option>
            @endforeach 
        </select>
        <br>
        <br>
        <b>Datos de Materia</b> <br>

        Nombre: <input type="text" name='name' placeholder="Nombre de Materia" required><br>

        <hr>
       <b>Configuración</b> <br>
        Día: <select name="day" required>
            <option value="2">Lunes</option><br>
            <option value="3">Martes</option><br>
            <option value="4">Miércoles</option><br>
            <option value="5">Jueves</option><br>
            <option value="6">Viernes</option><br>
        </select><br>
        Hora de inicio: <input type="time" name="start" min="15:00:00" ><br>
        Hora de Fin: <input type="time" name="finish" min="15:00:00" required><br>
        Rango: <input type="time" name="stop" required>
        *el <b>Rango</b> es el tiempo de tope para marcar una asistencia
        <input type="button" value="Agregar config" >
        <br>
        {{-- @foreach ($subjectsConfigs as $subjectconfig)
        
        @endforeach --}}
        
        <input type="submit" value="Guardar">
    </form>
</body>
</html>