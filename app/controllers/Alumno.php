<?php
namespace Controllers;
use \Bitphp\Http\Response;
use \Models\Alumnos;
use \Bitphp\Http\Request;
use \Components\File;

    class Alumno {

        private static function conexion(){
            $model=new Alumnos();
            $model::connect('sistema_de_control') ;
            $model::table('alumno');
            return $model;
        }
        public static function index (){
            $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
            $alumno=$model::find(); //con el find haces una consulta a la bd
            Response::status(200);
            response::json(array(
                'api' => '/alumno',
                'info'=> 'Consulta informacion de los alumnos.',
                'alumnos'=>$alumnos 
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
            // File::upload('foto', 3000000); //se indica el tamaño en bits que serian 3 kbytes
         
            $file=new file();
            // $file ->prevent_duplicate=false;
            $nombre=Request::post('nombre'); //tiene mayor seguridad
            $apellido=Request::post('apellidos');
            $edad=Request::post('edad');

            $file
            ->read('foto')
            ->image()
            ->size(500000)
            ->upload();
            if($file->err){
                echo $file ->err;
                exit;
            }
            echo $file ->path;
            // $imagen = addslashes(file_get_contents($_FILES['foto']['tmp']));

            $model=self::conexion();
            $alumno =array(
                       'Nombre'=>$nombre,
                       'Apellidos'=>$apellido,
                       'Edad'=>$edad,
                    'foto'=>$file->path
                   );
                   $result=$model::create($alumno);
                   var_dump($result);
         }
        public static function buscar ($id){
            $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
            $condicion="id='$id' ";
            $campos=array('nombre', 'edad');
            $resultado=$model::find($condicion,$campos);
            Response::status(200);
            response::json(array(
                'api' => '/alumno',
                'info'=> 'Consulta informacion de los alumnos.',
                'alumnos'=>$resultado //con el find haces una consulta a la bd
            ));
            
        }

        public static function borrar ($id){
            $model=self::conexion(); //self para hacer uso de los metodos de la misma clase
            $condicion="id='$id' ";
            
            $model::delete($condicion); //delete ya esta definido para eliminar un registro en la bd
            
            
        }
        public static function actualizar ($id){
            $file=new file();
            $nombre=Request::post('nombre'); //tiene mayor seguridad
            $apellido=Request::post('apellidos');
            $edad=Request::post('edad');
            $file
            ->read('foto')
            ->image()
            ->size(500000)
            ->upload();
            if($file->err){
                echo $file ->err;
                exit;
            }
            // $imagen = addslashes(file_get_contents($_FILES['foto']['tmp']));
            $model=self::conexion();
            $condicion="id='$id' ";
            $alumno =array(
                       'Nombre'=>$nombre,
                       'Apellidos'=>$apellido,
                       'Edad'=>$edad,
                       'Foto'=>$file->path
                   );
                //    var_dump $alumno;
                    $model::update($condicion,$alumno);
            //delete ya esta definido para eliminar un registro en la bd
            
            
        }
        
    
    }