<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencias</title>
</head>
<body>
    <a href="/dashboard"><button>Dasboard</button></a>   

    <table border="1">
        <thead>
            <tr>
                <th>id Estudiante</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Materia</th>
                <th>Día</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th colspan="2">Acciones</th>
                <form action={{ route('assists.create') }} method="GET">
                    @csrf
                    @method('GET')
                    <input style="margin:3ch" type="submit" value="Añadir Asistencia ✅">
                </form>
            </tr>
        </thead>

        
        <tbody>

            @foreach ($assists as $assist)
                <tr>
                    <td>{{ $assist->student->id }}</td>
                    <td>{{ $assist->student->lastname }}</td>
                    <td>{{ $assist->student->name }}</td>
                    <td>{{ $assist->subject->name }}</td>
                    <td>{{ $assist->day->day }}</td>
                    <td>{{ $assist->date }}</td> 
                    <td>{{ $assist->hour }}</td>
                    <td> <a href="assists/{{ $assist->id }}/edit"><button>✏️</button></a> </td>

                    <form action={{ route('assists.destroy', $assist->id) }} method="post">
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