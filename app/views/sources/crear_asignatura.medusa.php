:extends crear

:block formulario
<form class="" action="{{@baseurl}}/api/asignatura/nuevo" method="post">

<label for="">Nombre</label>
<input type="text" name="nombre" value=""><br>

<label for="">Docente</label>
<input type="text" name="docente" value=""><br>

<button type="submit">Guardar</button>
</form>

:endblock