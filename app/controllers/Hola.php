<?php
namespace Controllers;

use \Bitphp\Layout\Views;


class Hola{
    public static function index(){
       Views::draw('panel');
    }
    public static function mensaje($nombre){
        // echo "hola $nombre";
        Views::draw('hola',array('nombre'=>$nombre));
    }
    
}



