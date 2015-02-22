<?php

/*
 * Inicio 17/02/2015
 */
include_once '../../config.php';
require_once INICIO.'Conexion.php';
require_once INICIO.'catalogos/MetodosCatalogos.php';

class CategoriasCuentas implements MetodosCatalogos {

    private $idcategoriacuenta;
    private $categoriacuenta;

    public function __construct() {
        
    }

    public function getIdcategoriacuenta() {
        return $this->idcategoriacuenta;
    }

    public function getCategoriacuenta() {
        return $this->categoriacuenta;
    }

    public function setIdcategoriacuenta($idcategoriacuenta) {
        $this->idcategoriacuenta = $idcategoriacuenta;
    }

    public function setCategoriacuenta($categoriacuenta) {
        $this->categoriacuenta = $categoriacuenta;
    }

    public function buscarPorId() {
        
    }

    public function crearRegistro() {
        
    }

    public function editarRegistro() {
        
    }

    public function leerDatos() {
        $conecta = Conexion::open();
        try {
            $consulta_categorias_cuentas = "SELECT * FROM categorias_cuentas_view";
            $lista_categorias_cuentas = $conecta->query($consulta_categorias_cuentas);
            while ($fila_categoria_cuenta = $lista_categorias_cuentas->fetch_array(MYSQLI_ASSOC)) {
                $this->categoriacuenta[] = $fila_categoria_cuenta;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->categoriacuenta;
    }

}
