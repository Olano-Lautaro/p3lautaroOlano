<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Materia</title>
</head>
<body>
    <form action={{route("subjects.store")}} method="post">
        @csrf 
        Carrera:
        <select name="career" required>
            @foreach ($careers as $career)
                <option value="{{$career->id}}">{{$career->name}}</option>
            @endforeach 
        </select>
        <br>
        <br>
        <b>Datos de Materia</b> <br>

        Nombre: <input type="text" name='name' placeholder="Nombre de Materia" required><br>

        <hr>
       <b>Configuración</b> <br>
        Días:
        <div name="days" class="days-box">
            
                <div class="day-box" name="day-2">
                    Lunes <input type="checkbox" name="2" id="2"><br>
                    Hora de inicio: <input type="time" name="start" min="15:55:00"><br>
                    Hora de Fin: <input type="time" name="finish" max="22:15:00"><br>
                    Rango: <input type="time" name="stop">  
                </div>
                <div class="day-box" name="day-3">
                    Martes<input type="checkbox" name="3" id="3"><br>
                    Hora de inicio: <input type="time" name="start" min="15:55:00"><br>
                    Hora de Fin: <input type="time" name="finish" min="22:15:00"><br>
                    Rango: <input type="time" name="stop">
                    
                </div>
                <div class="day-box" name="day-4">
                    Miercoles<input type="checkbox" name="4" id="4"><br>
                    Hora de inicio: <input type="time" name="start" min="15:55:00"><br>
                    Hora de Fin: <input type="time" name="finish" max="22:15:00"><br>
                    Rango: <input type="time" name="stop">                   
                </div>
                <div class="day-box" name="day-5">
                    Jueves<input type="checkbox" name="5" id="5"><br>
                    Hora de inicio: <input type="time" name="start" min="15:55:00"><br>
                    Hora de Fin: <input type="time" name="finish" min="22:15:00"><br>
                    Rango: <input type="time" name="stop">               
                </div>
                <div class="day-box" name="day-6">
                    Viernes<input type="checkbox" name="6" id="6"><br>
                    Hora de inicio: <input type="time" name="start" min="15:55:00"><br>
                    Hora de Fin: <input type="time" name="finish" min="22:15:00"><br>
                    Rango: <input type="time" name="stop">
                </div>
    
        </div>
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
<style>
    .days-box{
        display: flex;
        /* flex-direction: row; */
        flex-flow: row wrap;
        flex: 1;
        justify-content: space-around;
    }
    .day-box{
        border-style: solid;
        border-color: gray;
        border-width: 1px;
    }
</style>