<?php

/* 
 * inicio 17/02/2015
 */

interface MetodosCatalogos{
    
    public function leerDatos();
    public function crearRegistro($var1);
    public function editarRegistro($var1,$var2);
    public function buscarPorId($var1);
    public function activarDesactivarCatalogo($var1);
}
