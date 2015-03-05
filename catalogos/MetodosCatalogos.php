<?php

/* 
 * inicio 17/02/2015
 */

interface MetodosCatalogos{
    
    public function leerDatos();
    public function crearRegistro($clase);
    public function editarRegistro($clase);
    public function buscarPorId($id);
    public function eliminar($id);
    public function activar($id);
    public function inactivar($id);
}
