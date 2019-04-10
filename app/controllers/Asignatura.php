<?php
namespace Controllers;
use \Bitphp\Http\Response;
use \Models\Asignaturas;
use \Bitphp\Http\Request;

    class Asignatura {
        public static function index (){
            Response::status(200);
            response::json(array(
                'api' => '/asignatura',
                'info'=> 'Consulta informacion de los asignatura.'
            ));
        }
     

    private static function conexion(){
        $model=new Asignaturas();
        $model::connect('sistema_de_control') ;
        $model::table('asignatura');
        return $model;
    }
   
    public static function nuevo(){
        // Response::json($_POST);
        $nombre=Request::post('nombre'); //tiene mayor seguridad
        $docente=Request::post('docente');
        
        $model=self::conexion();
        $asignatura =array(
                   'Nombre'=>$nombre,
                   'Docente'=>$docente  
               );
                $model::create($asignatura);
     }

     public static function buscar ($id){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $condicion="id='$id' ";
        $campos=array('nombre', 'docente');
        $resultado=$model::find($condicion,$campos);
        Response::status(200);
        response::json(array(
            'api' => '/asignatura',
            'info'=> 'Consulta informacion de las asignaturas.',
            'asignaturas'=>$resultado //con el find haces una consulta a la bd
        ));
        
    }

    public static function borrar ($id){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $condicion="id='$id' ";
        
        $model::delete($condicion); //delete ya esta definido para eliminar un registro en la bd
        
    }

}