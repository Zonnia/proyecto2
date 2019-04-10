:extends crear

:block formulario
<form class="" action="{{@baseurl}}/api/mascota/nuevo" method="post">

<label for="">Nombre:</label><br>
<input type="text" name="nombre" value=""><br>

<label for="">Especie:</label><br>
<input type="text" name="especie" value=""><br>

<label for="">Raza:</label><br>
<input type="text" name="raza" value=""><br>

<label for="">Color:</label><br>
<input type="text" name="color" value=""><br>

<label for="">Edad:</label><br>
<input type="number" name="edad" value=""><br>

<label for="">Nombre del dueño:</label><br>
<input type="text" name="nombre2" value=""><br>

<label for="">Edad del dueño:</label><br>
<input type="number" name="edad2" value=""><br>

<label for="">Correo del dueño:</label><br>
<input type="text" name="correo" value=""><br>

<label for="">Telefono del dueño:</label><br>
<input type="text" name="telefono" value=""><br>
<br>
<button type="submit">Guardar</button>
</form>

:endblock