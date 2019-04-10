:extends crear

:block formulario
<!-- <h1>actualizar {{$alumno.nombre}},tienes{{$alumno.edad}}</h1> -->
<form class="" action="{{@baseurl}}/api/alumno/{{$alumno.id}}/actualizar" method="post" enctype="multipart/form-data">

<label for="">Nombre</label>
<input type="text" name="nombre"  value="{{$alumno.nombre}}" ><br><br>

<label for="">Apellidos</label>
<input type="text" name="apellidos" value="{{$alumno.apellidos}}"><br><br>

<label for="">Edad</label>
<input type="number" name="edad" value="{{$alumno.edad}}"><br><br>

<label>Fotografia</label><br>
<img src="{{@baseurl}}/{{$alumno.foto}}" height="80" alt=""><br><br>
<label>Actualizar</label>
<input type="file" name="foto" value="" ><br><br>



<input type="submit" name="submit" value="Actualizar">
</form>

:endblock