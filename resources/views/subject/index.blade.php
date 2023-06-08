<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subjects</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>Materia</th>
                <th colspan="3">Acciones</th>
                <form action={{ route('subjects.create') }} method="GET">
                    @csrf
                    @method('GET')
                    <input style="margin:3ch" type="submit" value="Añadir Materia ✅">
                </form>
            </tr>
        </thead>


        <tbody>

            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>

                    <td> <a href="subjects/{{ $subject->id }}/edit"><button>✏️</button></a> </td>

                    <form action={{ route('subjects.destroy', $subject->id) }} method="post">
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
