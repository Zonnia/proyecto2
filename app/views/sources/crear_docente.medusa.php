:extends crear

:block formulario
<form class="" action="{{@baseurl}}/api/docente/nuevo" method="post">

<label for="">Nombre</label>
<input type="text" name="nombre" value=""><br>

<label for="">Apellidos</label>
<input type="text" name="apellidos" value=""><br>

<label for="">Edad</label>
<input type="number" name="edad" value=""><br>
<button type="submit">Guardar</button>
</form>

:endblock