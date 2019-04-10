<?php
namespace Controllers;
use \Bitphp\Http\Response;
use \Models\Mascotas;
use \Bitphp\Http\Request;

    class Mascota {

        private static function conexion(){
            $model=new Mascotas();
            $model::connect('veterinario') ;
            $model::table('mascota');
            return $model;
        }
        public static function index (){
            $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
            $mascota=$model::find(); //con el find haces una consulta a la bd
            Response::status(200);
            response::json(array(
                'api' => '/mascota',
                'info'=> 'Consulta informacion de los mascotas.',
                'mascota'=>$mascota 
            ));
            
        }
        // public static function nuevo(){
        //    $model=new Alumnos(); 
        //    $model::connect('sistema_de_control') ;
        //    $model::table('alumno');
        //    $alumno =array(
        //        'Nombre'=>'juan',
        //        'Apellidos'=>'Garcia Lopez',
        //        'Edad'=>15
        //    );
        //     $model::create($alumno);

        // }

        public static function nuevo(){
            // Response::json($_POST);
            $nombre=Request::post('nombre'); //tiene mayor seguridad
            $especie=Request::post('especie');
            $raza=Request::post('raza');
            $color=Request::post('color');
            $edad=Request::post('edad');
            $nombre2=Request::post('nombre2');
            $edad2=Request::post('edad2');
            $correo=Request::post('correo');
            $telefono=Request::post('telefono');

            $model=self::conexion();
            $mascota =array(
                       'Nombre'=>$nombre,
                       'Especie'=>$especie,
                       'Raza'=>$raza,
                       'Color'=>$color,
                       'Edad'=>$edad,
                       'Nombre2'=>$nombre2,
                       'Edad2'=>$edad2,
                       'Correo'=>$correo,
                       'Telefono'=>$telefono
                   );
                    $model::create($mascota);
         }
        public static function buscar ($id){
            $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
            $condicion="id='$id' ";
            $campos=array('nombre', 'especie', 'nombre2', 'telefono');
            $resultado=$model::find($condicion,$campos);
            Response::status(200);
            response::json(array(
                'api' => '/mascota',
                'info'=> 'Consulta informacion de las mascotas.',
                'mascotas'=>$resultado //con el find haces una consulta a la bd
            ));
            
        }

        public static function borrar ($id){
            $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
            $condicion="id='$id' ";
            
            $model::delete($condicion); //delete ya esta definido para eliminar un registro en la bd
            
            
        }
        
    
    }