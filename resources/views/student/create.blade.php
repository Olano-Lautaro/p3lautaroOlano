<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Alumno</title>
</head>
<body>
    <form action={{route("students.store")}} method="post">
        @csrf
        Carrera: 
        <select name="career" required>
            @foreach ($careers as $career)
                <option value="{{$career->id}}">{{$career->name}}</option>
            @endforeach 
        </select> 
        <select name="subjects">
            @foreach ( $subjects as $subject )
                
                <option value="{{$subject->id}}">{{$subject->name}}</option>
                
            @endforeach
        </select>
        

         
        <hr>

        Nombre: <input type="text" name='name' placeholder="Nombre"><br>
        Apellido: <input type="text" name='lastname' placeholder="Apellido"><br>
        DNI: <input type="text" name='dni' placeholder="DNI"><br>
        Fecha de Nacimiento: <input type="date" name='birthday' placeholder="Fecha Nac..."><br>
        Estado: <input type="number" name='status' placeholder="Estado"><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
