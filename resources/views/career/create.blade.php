<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Carrera</title>
</head>
<body>
    <form action={{route("careers.store")}} method="post">
        @csrf 
        <b>Datos de la Carrera</b> <br>
        Nombre: <input type="text" name='name' placeholder="Carrera"><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>