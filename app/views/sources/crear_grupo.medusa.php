:extends crear

:block formulario
<form class="" action="{{@baseurl}}/api/grupo/nuevo" method="post">

<label for="">Aula</label>
<input type="text" name="aula" value=""><br>

<button type="submit">Guardar</button>
</form>

:endblock