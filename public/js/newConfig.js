function newConfig(){
    var div= document.getElementById('new-config');

    div.innerHTML= `<h4>Nueva Configuración</h4>
    <input type="checkbox" name="new_config" id="new_config" checked hidden>
    Dia: <select name="day-new">
    <option value="2">Lunes</option><br>
    <option value="3">Martes</option><br>
    <option value="4">Miércoles</option><br>
    <option value="5">Jueves</option><br>
    <option value="6">Viernes</option><br>
    </select><br>
    Hora de inicio: <input type="time" name="start-new" min="15:55:00" max="22:25:00"><br>
    Hora de Fin: <input type="time" name="finish-new" min="15:55:00" max="22:25:00"><br>
    Rango: <input type="time" name="stop-new"  min="15:55:00" max="22:25:00">
    <br>`;


}