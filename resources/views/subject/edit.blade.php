<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Materia</title>
</head>

<body>
    <b>Datos de Materia</b><br>
    <form action="{{ route('subjects.update', $subject[0]->id) }}" method="POST">
        @csrf
        @method('PUT')

        Nombre: <input type="text" name='name' value='{{ $subject[0]->name }}'><br>

        <hr>
        <b>Configuración</b><br>
        @foreach ( $configs as $config)
            Día establecido : {{ $day[0]->day}} <br>
            *Cambiar dia*<select name="day">
            <option value="2">Lunes</option><br>
            <option value="3">Martes</option><br>
            <option value="4">Miércoles</option><br>
            <option value="5">Jueves</option><br>
            <option value="6">Viernes</option><br>
        </select><br>
        Hora de inicio: <input type="time" name="start" value={{ $config[0]->start}}><br>
        Hora de Fin: <input type="time" name="finish" value={{ $config[0]->finish}}><br>
        Rango: <input type="time" name="stop" value={{ $config[0]->stop}}>
        *el <b>Rango</b> es el tiempo de tope para marcar una asistencia
        <br>
        @endforeach
        


        <input type="submit" value="Guardar">
    </form>
</body>

</html>
