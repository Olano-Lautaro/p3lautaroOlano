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
                <th>Acciones</th>
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
                    </tr>
             @endforeach 

        </tbody>

    </table>      
   
</body>
</html>

