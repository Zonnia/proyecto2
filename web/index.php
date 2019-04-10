<?php

require '../autoload.php'; //permitir utilizar enrrutamiento

use \Bitphp\Route;
use \Bitphp\Layout\Medusa;
use \Bitphp\Http\Response;

// Route::match('GET /', function() { 
//    echo "Hola mundo";

// });
Route::match('GET /api',function(){
Response::status(200);
Response::json(array(
    'version' => '0.1',
    'info'=> 'sistema de gestion de rubricas.'
));

});

Route::match('GET /api/alumno','alumno@index');

Route::match('GET /api/docente','docente@index');

Route::match('GET /api/grupo','grupo@index');

Route::match('GET /api/asignatura','asignatura@index');

Route::match('GET /api/rubrica','rubrica@index');

Route::match('GET /api/mascota','mascota@index');

//para alumnos
Route::match('GET /alumno/crear', 'interfaz@crear_alumno');
Route::match('POST /api/alumno/nuevo','alumno@nuevo'); //get o post dependiendo de donde se envien los datos
Route::match('GET /api/alumno/int$id','alumno@buscar');
Route::match('GET /api/alumno/int$id/borrar','alumno@borrar');
Route::match('GET /alumno/actualizar/int$id', 'interfaz@actualizar_alumno');
Route::match('POST /api/alumno/int$id/actualizar','alumno@actualizar');

// para docentes
Route::match('GET /docente/crear', 'interfaz@crear_docente');
Route::match('POST /api/docente/nuevo','docente@nuevo'); //get o post dependiendo de donde se envien los datos
Route::match('GET /api/docente/int$id','docente@buscar');
Route::match('GET /api/docente/int$id/borrar','docente@borrar');

// para rubrica
Route::match('GET /rubrica/crear', 'interfaz@crear_rubrica');
Route::match('POST /api/rubrica/nuevo','rubrica@nuevo'); //get o post dependiendo de donde se envien los datos
Route::match('GET /api/rubrica/int$id','rubrica@buscar');
Route::match('GET /api/rubrica/int$id/borrar','rubrica@borrar');

// para asignatura
Route::match('GET /asignatura/crear', 'interfaz@crear_asignatura');
Route::match('POST /api/asignatura/nuevo','asignatura@nuevo'); //get o post dependiendo de donde se envien los datos
Route::match('GET /api/asignatura/int$id','asignatura@buscar');
Route::match('GET /api/asignatura/int$id/borrar','asignatura@borrar');

// para grupo
Route::match('GET /grupo/crear', 'interfaz@crear_grupo');
Route::match('POST /api/grupo/nuevo','grupo@nuevo'); //get o post dependiendo de donde se envien los datos
Route::match('GET /api/grupo/int$id','grupo@buscar');
Route::match('GET /api/grupo/int$id/borrar','grupo@borrar');

// para mascota
Route::match('GET /mascota/crear', 'interfaz@crear_mascota');
Route::match('POST /api/mascota/nuevo','mascota@nuevo'); //get o post dependiendo de donde se envien los datos
Route::match('GET /api/mascota/int$id','mascota@buscar');
Route::match('GET /api/mascota/int$id/borrar','mascota@borrar');

// Route::match('GET /hola/$nombre','hola@mensaje');
// Route::match('GET /panel/alumno', function() { 
//    echo "Panel del alumno";
// });
// Route::match('GET /panel/docente', function() { 
//    echo "Panel del docente";
// });
// Route::match('GET /error', function() { 
//    echo "Error";
// });

// Route::match('GET /test', function() { 
//    echo "hola desconocido";
// });

// Route::match('GET /test/$nombre', function($nombre) { 
//     echo "hola ".$nombre;
//  });

//  Route::match('GET /email/', function($nombre) { 
//     echo "hola ".$nombre;
//  });
