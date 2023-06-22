<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carreras</title>
</head>
<body>
    <a href="/dashboard"><button>Dasboard</button></a>   
    <table border="1">
        <thead>
            <tr>
                <th>Carrera</th>
                <th colspan="2">Acciones</th>
                <form action={{ route('careers.create') }} method="GET">
                    @csrf
                    @method('GET')
                    <input style="margin:3ch" type="submit" value="Añadir Carrera ✅">
                </form>
            </tr>
        </thead>


        <tbody>

            @foreach ($careers as $career)
                <tr>
                    <td>{{ $career->name }}</td>

                    <td> <a href="careers/{{ $career->id }}/edit"><button>✏️</button></a> </td>

                    <form action={{ route('careers.destroy', $career->id) }} method="post">
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