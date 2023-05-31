<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
   <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Fecha Nacimiento</th>
                <th>Estado</th>
                <th colspan="2">Acciones</th>
                <th>
                    <form action={{route('students.create')}} method="post">
                        @csrf
                        <input type="submit" value="Añadir Alumno">
                    </form>
                </th>
            </tr>
        </thead>
        
        
        <tbody>

            @foreach ($students as $student)
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->lastname}}</td>
                        <td>{{$student->dni}}</td>
                        <td>{{$student->birthdate}}</td>
                        <td>{{$student->status}}</td>
                        <td> <a href="students/{{$student->id}}/edit"><input type="button" value="Editar"></a> </td>
                        
                        <form action={{route('students.destroy', $student->id)}} method="post">
                            @csrf
                            @method('delete')
                            <th><input type="submit" value="Eliminar"></th>
                        </form>
                    </tr>
                    
             @endforeach 

        </tbody>

    </table>      
   
</body>
</html>

