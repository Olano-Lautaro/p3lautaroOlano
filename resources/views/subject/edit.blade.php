<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Materia</title>
</head>
<body>
    <form action="{{route('subjects.update', $subject[0]->id)}}" method="POST">
        @csrf
        @method('PUT')
 
         Nombre: <input type="text" name='name' value='{{$subject[0]->name}}'><br>
 
         <input type="submit" value="Guardar">
     </form>
</body>
</html>