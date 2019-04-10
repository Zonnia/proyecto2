:extends crear

:block formulario
<form class="" action="{{@baseurl}}/api/rubrica/nuevo" method="post">

<label for="">Alumno</label>
<input type="text" name="alumno" value=""><br>

<label for="">Materia</label>
<input type="text" name="materia" value=""><br>

<label for="">Docente</label>
<input type="text" name="docente" value=""><br>

<label for="">Tipo</label>
<input type="text" name="tipo" value=""><br>

<label for="">Valor</label>
<input type="number" name="valor" value=""><br>
<button type="submit">Guardar</button>
</form>

:endblock