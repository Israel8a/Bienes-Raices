<?php 
namespace App;
class ActiveRecord{
    //conectar db
    protected static $db;
    //damos forma qu va a tener
    protected static $columnasDb=[""];
    protected static $tabla ="";
    //errores
    protected static $errores =[];
    public static function setDb($database){
         self::$db=$database;
    }
    
    public function guardar(){
        if(!is_null($this->id)){
            $this->actualizar();
        }else{
            $this->crear();
        }
    }
     public function crear(){
         $atributos = $this->sanitizarAtributos();
         
         $query = " INSERT INTO ". static::$tabla." (";
         $query.=join(', ',array_keys($atributos));
         $query.=") VALUES(' ";
         $query.=join("', '",array_values($atributos));
         $query.=" ') ";
         $resultado=self::$db->query($query);
         if($resultado){
             //redirecionar al usuario
             header("Location: /admi?registrado=1");
         }
     }
     public function actualizar(){
         $atributos = $this->sanitizarAtributos();
         $valores =[];
         foreach ($atributos as $key => $value) {
             $valores[] ="{$key}='{$value}'";
         }
         $query = "UPDATE ".static::$tabla." SET ";
         $query.= join(', ' ,$valores);
         $query.=" WHERE id = ' ". self::$db->escape_string($this->id). "' ";
         $query.= "LIMIT 1";
         $resultado=self::$db->query($query);
         if($resultado){
             header("Location: /admi?registrado=2");
         }
         return $resultado;
     }
     //liminar elemento
     public function eliminar(){
         $query= "DELETE FROM ".static::$tabla." WHERE id = ".self::$db->escape_string($this->id). " LIMIT 1 ";
         $resultado = self::$db->query($query);
         if($resultado){
             $this->borrarImagen();
             header("Location: /admi?registrado=3");
         }
     }
     //db traer por id
     public static function find($id){
         $query ="SELECT * FROM ".static::$tabla." WHERE id={$id}";
         $resultado = self::consultarSQL($query);
         return array_shift($resultado);
     }
     // identifar y unir
     public function atributos(){
         $atributos =[];
         foreach (static::$columnasDb as $columna) {
             if($columna ==="id")continue;
             $atributos[$columna]= $this->$columna;
         }
         return $atributos;
     }
     public function sanitizarAtributos(){
         $atributos= $this->atributos();
         $sanitazar =[];
         foreach ($atributos as $key => $value) {
             $sanitazar[$key]= self::$db->escape_string($value);
         }
         return $sanitazar;
     }
     //subida de archivo
     public function setImagen($imagen){
         if(!is_null($this->id)){
         $this->borrarImagen();
         }
         //asignar el atributo de img el nombre de la img
         if ($imagen) {
             $this->imagen= $imagen;
         }
     }
     //borrar imagen
     public function borrarImagen(){
         //elimina img previa
         if(isset($this->id)){
             //comprobar si existe
             $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
             if($existeArchivo){
                 unlink(CARPETA_IMAGENES.$this->imagen);
             }
         }
     }
     //validacion
     public static function getErrores(){
        return static::$errores;
     }
    public function validar(){
        static::$errores=[];
        return static::$errores;
     }
    public static function all(){
        $query = "SELECT * FROM ". static::$tabla;
        $propiedad= self::consultarSQL($query);
        return $propiedad;
    }
    public static function get($cantidad){
        $query = "SELECT * FROM ". static::$tabla." LIMIT ". $cantidad;
        $propiedad= self::consultarSQL($query);
        return $propiedad;
     }
     protected static function consultarSQL($query){
         $resultado = self::$db->query($query);
         $array =[];
         while ($registro =$resultado->fetch_assoc()) {
             $array[]=static::crearObj($registro);
         }
         return $array;
     }
     protected static function crearObj($registrado){
         $objeto = new static;
         foreach ($registrado as $key => $value) {
             if(property_exists($objeto, $key)){
                 $objeto->$key = $value;
             }
         }
         return $objeto;
     }
     //sinconiza el obj en memoria con los camios realizados por el usuari
     public function sincronizar($args =[]){
         foreach ($args as $key => $value){
             if(property_exists($this, $key ) && !is_null($value) ){
                 $this->$key = $value;
             }
         }
         return $args;
     }
}