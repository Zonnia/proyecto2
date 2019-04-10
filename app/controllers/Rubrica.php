<?php
namespace Controllers;
use \Bitphp\Http\Response;
use \Models\Rubricas;
use \Bitphp\Http\Request;

    class rubrica {
        public static function index (){
            Response::status(200);
            response::json(array(
                'api' => '/rubrica',
                'info'=> 'Consulta informacion de las rubricas.'
            ));
        }
    

    private static function conexion(){
        $model=new Rubricas();
        $model::connect('sistema_de_control') ;
        $model::table('rubrica');
        return $model;
    }
   
    public static function nuevo(){
        // Response::json($_POST);
        $alumno=Request::post('alumno'); //tiene mayor seguridad
        $materia=Request::post('materia');
        $docente=Request::post('docente');
        $tipo=Request::post('materia');
        $valor=Request::post('valor');

        $model=self::conexion();
        $rubrica =array(
                   'Alumno'=>$alumno,
                   'Materia'=>$materia,
                   'Docente'=>$docente,
                   'Tipo'=>$tipo,
                   'Valor'=>$valor
               );
                $model::create($rubrica);
     }

     public static function buscar ($id){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $condicion="id='$id' ";
        $campos=array('alumno', 'materia');
        $resultado=$model::find($condicion,$campos);
        Response::status(200);
        response::json(array(
            'api' => '/rubrica',
            'info'=> 'Consulta informacion de los docentes.',
            'rubricas'=>$resultado //con el find haces una consulta a la bd
        ));
        
    }

    public static function borrar ($id){
        $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
        $condicion="id='$id' ";
        
        $model::delete($condicion); //delete ya esta definido para eliminar un registro en la bd
        
    }

}