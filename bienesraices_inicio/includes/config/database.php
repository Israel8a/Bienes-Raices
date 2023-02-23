<?php

function conectarDB(): mysqli{
    $db = new mysqli("localhost","root","3333555762mi+","bienesraices_crud");
    if (!$db) {
        echo "No Conectado";
        exit;
    } 
    return $db;
    
}