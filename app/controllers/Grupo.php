<?php
namespace Controllers;
use \Bitphp\Http\Response;
use \Models\Grupos;
use \Bitphp\Http\Request;
    class Grupo {
        public static function index (){
            Response::status(200);
            response::json(array(
                'api' => '/grupo',
                'info'=> 'Consulta informacion de los grupos.'
            ));
        }
       

    private static function conexion(){
        $model=new Grupos();
        $model::connect('sistema_de_control') ;
        $model::table('grupo');
        return $model;
    }
   
    public static function nuevo(){
        // Response::json($_POST);
        $aula=Request::post('aula'); //tiene mayor seguridad
        
        $model=self::conexion();
        $grupo =array(
                   'Aula'=>$aula
               );
                $model::create($grupo);
     }

     public static function buscar ($id){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $condicion="id='$id' ";
        $campos=array('aula');
        $resultado=$model::find($condicion,$campos);
        Response::status(200);
        response::json(array(
            'api' => '/grupo',
            'info'=> 'Consulta informacion de los grupos.',
            'grupos'=>$resultado //con el find haces una consulta a la bd
        ));
        
    }

    public static function borrar ($id){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $condicion="id='$id' ";
        
        $model::delete($condicion); //delete ya esta definido para eliminar un registro en la bd
        
    }

}