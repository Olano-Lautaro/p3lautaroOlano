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
            <div class="day-box" name="2" id="2">
                Lunes <input type="checkbox" name="check2"><br>
                Hora de inicio: <input type="time" name="start-2" min="15:55:00"><br>
                Hora de Fin: <input type="time" name="finish-2" max="22:15:00"><br>
                Rango: <input type="time" name="stop-2">  
            </div>
            
            <div class="day-box" name="3" id="3">
                Martes<input type="checkbox" name="check3"><br>
                Hora de inicio: <input type="time" name="start-3" min="15:55:00"><br>
                Hora de Fin: <input type="time" name="finish-3" max="22:15:00"><br>
                Rango: <input type="time" name="stop-3">
                
            </div>
            
            <div class="day-box" name="4" id="4">
                Miercoles<input type="checkbox" id="checkbox" name="check4"><br>
                Hora de inicio: <input type="time" name="start-4" min="15:55:00"><br>
                Hora de Fin: <input type="time" name="finish-4" max="22:15:00"><br>
                Rango: <input type="time" name="stop-4">                   
            </div>
            
            <div class="day-box" name="5" id="5">
                Jueves<input type="checkbox" id="checkbox" name="check5"><br>
                Hora de inicio: <input type="time" name="start-5" min="15:55:00"><br>
                Hora de Fin: <input type="time" name="finish-5" max="22:15:00"><br>
                Rango: <input type="time" name="stop-5">               
            </div>
            
            <div class="day-box" name="6" id="6">
                Viernes<input type="checkbox" id="checkbox" name="check6"><br>
                Hora de inicio: <input type="time" name="start-6" min="15:55:00"><br>
                Hora de Fin: <input type="time" name="finish-6" max="22:15:00"><br>
                Rango: <input type="time" name="stop-6">
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
        flex-flow: row wrap;
        flex: 1;
        justify-content: space-around;
        text-align: center;
        align-items: baseline;
    }
    .day-box{
        border-style: solid;
        border-color: gray;
        border-width: 1px;
        padding: 0.5%;
    }
</style>