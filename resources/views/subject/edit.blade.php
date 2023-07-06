<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Materia</title>

    <script src={{ asset('js/newConfig.js') }}></script>
</head>

<body>
    <b>Datos de Materia</b><br>
    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        Nombre: <input type="text" name='name' value='{{ $subject->name }}'><br>

        <hr>
        <b>Configuración</b><br>
        <div class="days-box">
            @foreach ($configs as $key => $config)
                <div class="day-box">
                    Día establecido : {{ $config->day->day }} <br>
                    *Cambiar dia*
                    <select name="day-{{ $key }}">
                        <option value="2" {{ $config->day->id == 2 ? 'selected' : '' }}>Lunes</option>
                        <option value="3" {{ $config->day->id == 3 ? 'selected' : '' }}>Martes</option>
                        <option value="4" {{ $config->day->id == 4 ? 'selected' : '' }}>Miércoles</option>
                        <option value="5" {{ $config->day->id == 5 ? 'selected' : '' }}>Jueves</option>
                        <option value="6" {{ $config->day->id == 6 ? 'selected' : '' }}>Viernes</option>
                    </select><br>
                    Hora de inicio:
                    <input type="time" name="start-{{ $key }}" value={{ $config->start }} min="15:55:00"
                        max="22:25:00">
                    <br>
                    Hora de Fin:
                    <input type="time" name="finish-{{ $key }}" value={{ $config->finish }} min="15:55:00"
                        max="22:25:00">
                    <br>
                    Rango:
                    <input type="time" name="stop-{{ $key }}" value={{ $config->stop }} min="15:55:00"
                        max="22:25:00">
                    <br>
                </div>
            @endforeach

            <div class="day-box" id="new-config">
                <input type="checkbox" name="new_config" id="new_config" hidden>
            </div>
        </div>



        <input type="submit" value="Guardar">
    </form>
    <button onclick="newConfig()">Agregar Config</button>

    <br>
    <a href="/subjects"><button style="margin: 2">Cancelar</button></a>
</body>

</html>
<style>
    .days-box {
        display: flex;
        flex-flow: row wrap;
        flex: 1;
        justify-content: space-around;
        text-align: center;
        align-items: baseline;
    }

    .day-box {
        border-style: solid;
        border-color: gray;
        border-width: 1px;
    }

    .btn-delete {
        display: flex;
        justify-content: end;
    }
</style>
