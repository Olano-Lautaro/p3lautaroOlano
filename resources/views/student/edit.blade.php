<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Estudiante</title>
</head>
<body>
    <form action="{{route('Students.update', $student[0]->id)}}" method="POST">
       @csrf
       @method('PUT')

        Nombre: <input type="text" name='name' value='{{$student[0]->name}}'><br>
        Apellido: <input type="text" name='lastname' value='{{$student[0]->lastname}}'><br>
        DNI: <input type="text" name='dni' value='{{$student[0]->dni}}'><br>
        Fecha de Nacimiento: <input type="datetime" name='birthdate' value='{{$student[0]->birthdate}}'><br>
        Estado: <input type="number" name='status' value='{{$student[0]->status}}'><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>