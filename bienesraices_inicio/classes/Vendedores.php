<?php
namespace App;
class Vendedores extends ActiveRecord{
    protected static $tabla = "vendedores";
    protected static $columnasDb=["id","nombre","apellido","telefono"];
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public function __construct($args=[])
    {
        $this->id = $args["id"] ?? NULL;
        $this->nombre = $args["nombre"] ?? ""; 
        $this->apellido = $args["apellido"] ?? "";
        $this->telefono = $args["telefono"] ?? "";
    } 
    public function validar(){
        if(!$this->nombre){
            self::$errores[] = "El Nombre es obrigatoria";
        }
        if(!$this->apellido){
            self::$errores[] = "El Apellido es obrigatoria";
        }
        if(!$this->telefono){
            self::$errores[] = "El Telefono es obrigatoria";
        }
        if(!preg_match('/[0-9]{10}/',$this->telefono)){
            self::$errores[]="Formato no valido";
        }
        return self::$errores;
    }
}