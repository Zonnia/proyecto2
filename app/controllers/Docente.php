<?php
namespace Controllers;
use \Bitphp\Http\Response;
use \Models\Docentes;
use \Bitphp\Http\Request;

    class docente{
    //     public static function index (){
    // //         Response::status(200);
    // //         response::json(array(
    // //             'api' => '/docente',
    // //             'info'=> 'Consulta informacion de los docentes.'
    // //         ));
    // //     }
    // }



    private static function conexion(){
        $model=new Docentes();
        $model::connect('sistema_de_control') ;
        $model::table('docente');
        return $model;
    }
    public static function index (){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $docente=$model::find(); //con el find haces una consulta a la bd
        Response::status(200);
        response::json(array(
            'api' => '/docente',
            'info'=> 'Consulta informacion de los docentes.',
            'docente'=>$docente 
        ));
        
    }

    public static function nuevo(){
        // Response::json($_POST);
        $nombre=Request::post('nombre'); //tiene mayor seguridad
        $apellido=Request::post('apellidos');
        $edad=Request::post('edad');

        $model=self::conexion();
        $docente =array(
                   'Nombre'=>$nombre,
                   'Apellidos'=>$apellido,
                   'Edad'=>$edad
               );
                $model::create($docente);
     }

     public static function buscar ($id){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $condicion="id='$id' ";
        $campos=array('nombre', 'edad');
        $resultado=$model::find($condicion,$campos);
        Response::status(200);
        response::json(array(
            'api' => '/docente',
            'info'=> 'Consulta informacion de los docentes.',
            'docentes'=>$resultado //con el find haces una consulta a la bd
        ));
        
    }

    public static function borrar ($id){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $condicion="id='$id' ";
        
        $model::delete($condicion); //delete ya esta definido para eliminar un registro en la bd
        
    }

}