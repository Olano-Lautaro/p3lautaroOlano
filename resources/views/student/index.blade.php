<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <a href="/dashboard"><button>Dasboard</button></a>   

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Fecha Nacimiento</th>
                <th>Estado</th>
                <th colspan="2">Acciones</th>
                <form action={{ route('students.create') }} method="GET">
                    @csrf
                    @method('GET')
                    <input style="margin:3ch" type="submit" value="Añadir Alumno ✅">
                </form>
            </tr>
        </thead>

        
        <tbody>

            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->lastname }}</td>
                    <td>{{ $student->dni }}</td>
                    <td>{{ $student->birthday }}</td>
                    <td>{{ $student->status }}</td>
                    <td> <a href="students/{{ $student->id }}/edit"><button>✏️</button></a> </td>

                    <form action={{ route('students.destroy', $student->id) }} method="post">
                        @csrf
                        @method('delete')
                        <th><button>🗑️</button></th>
                    </form>
                </tr>
            @endforeach

        </tbody>

    </table>

</body>

</html>
