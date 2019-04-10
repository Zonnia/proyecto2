:extends crear

:block formulario
<h1>Crear un nuevo registro</h1>
<form class="" id="crear_alumno" action="{{@baseurl}}/api/alumno/nuevo" method="post" enctype="multipart/form-data">

<label for="">Nombre</label>
<input type="text" name="nombre" id="name" value="" value="<?php echo $datos['nombre'];?>"><br>

<label for="">Apellidos</label>
<input type="text" name="apellidos" id="surname" value="" value="<?php echo $datos['apellidos'];?>"><br>

<label for="">Edad</label>
<input type="number" name="edad" id="age" value="" value="<?php echo $datos['edad'];?>"><br>

<label>Fotografia</label>
<input type="file" name="foto" id="photo" value="" ><br>

<!-- <input type="submit" name="submit" onclick="validar()" value="Guardar"> -->
<button  class="boton" type="button" onclick="validar()">Registrase</button>
</form>
:js crear_alumno
:endblock