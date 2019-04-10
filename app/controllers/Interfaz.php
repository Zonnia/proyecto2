<?php
namespace Controllers;
use \Bitphp\Layout\Medusa;
use \Models\Alumnos;

class interfaz{
    private static function conexion(){
        $model=new Alumnos();
        $model::connect('sistema_de_control') ;
        $model::table('alumno');
        return $model;
    }
    public static function crear_alumno(){
        Medusa::draw('crear_alumno');
        // Medusa::draw('crear_docente');
    }

    public static function crear_docente(){
        Medusa::draw('crear_docente');
       
    }

    public static function crear_rubrica(){
        Medusa::draw('crear_rubrica');
        
    }

    public static function crear_asignatura(){
        Medusa::draw('crear_asignatura');
        
    }

    public static function crear_grupo(){
        
        Medusa::draw('crear_grupo');
        
    }

    public static function crear_mascota(){
        Medusa::draw('crear_mascota');
        
    }
    public static function actualizar_alumno($id){
        
        
            $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
            $condicion="id='$id' ";
            $campos=array('id','nombre','apellidos','edad','foto');
            $resultado=$model::find($condicion,$campos);
            Medusa::draw('actualizar_alumno',array('alumno'=>$resultado[0]));
            // Response::status(200);
            // response::json(array(
                // 'api' => '/alumno',
                // 'info'=> 'Consulta informacion de los alumnos.',
                // 'alumnos'=>$resultado //con el find haces una consulta a la bd
            // ));
        
        
    }
}