<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Asistencia</title>
</head>
<body>
    <form action={{route("assists.store")}} method="post">
        @csrf 
        @if ($error)
            <div class="error">{{ $error }}</div> 
        @endif
        DNI Estudiante: <input type="text" name='dni' placeholder="DNI"><br>
        {{-- futuro select de Carrera y materia --}}


        <input type="submit" value="Guardar">
    </form>
    <a href="/assists"><button>Cancelar</button></a>
</body>
</html>
<style>
    .error{
        height: 50px;
        width: 300px;
        background-color: red;
        color: #4e0b0b;
        margin: 0.5%;
    }
</style>