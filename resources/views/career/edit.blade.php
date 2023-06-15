<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Carrera</title>
</head>
<body>
    <form action="{{ route('careers.update', $career[0]->id) }}" method="POST">
        @csrf
        @method('PUT')

        Nombre: <input type="text" name='name' value='{{ $career[0]->name }}'><br>

        <input type="submit" value="Guardar">
</body>
</html>