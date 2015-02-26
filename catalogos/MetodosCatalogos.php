<?php

/* 
 * inicio 17/02/2015
 */

interface MetodosCatalogos{
    
    public function leerDatos();
    public function crearRegistro($clase);
    public function editarRegistro($clase);
    public function buscarPorId($id);
}
