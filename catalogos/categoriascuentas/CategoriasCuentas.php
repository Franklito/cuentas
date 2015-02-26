<?php

/*
 * Inicio 17/02/2015
 */
include_once '../../config.php';
require_once '../../Conexion.php';
require_once '../MetodosCatalogos.php';

class CategoriasCuentas implements MetodosCatalogos {

    private $idcategoriacuenta;
    private $categoriacuenta;
    private $idestructurabase;

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
    
    function getIdestructurabase() {
        return $this->idestructurabase;
    }

    function setIdestructurabase($idestructurabase) {
        $this->idestructurabase = $idestructurabase;
    }
    
    public function buscarPorId($id) {
        
    }

    public function crearRegistro($categoria) {
        echo 'Estoy en crear registro';
        $conecta = Conexion::open();
        try {
            $consulta_categorias_cuentas_crear = "INSERT INTO categoriascuentas (categoriacuenta,"
                    . "idestructurabase) Value($categoria->categoriacuenta,$categoria->idestructurabase)";
            $conecta->query($consulta_categorias_cuentas_crear);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conecta->close();
    }

    public function editarRegistro($categoria) {
        $conecta = Conexion::open();
        try {
            $consulta_categorias_cuentas = "UPTADE categoriascuentas SET categoria";
            $lista_categorias_cuentas = $conecta->query($consulta_categorias_cuentas);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function leerDatos() {
        $conecta = Conexion::open();
        try {
            $consulta_categorias_cuentas = "SELECT * FROM categorias_cuentas_view";
            $lista_categorias_cuentas = $conecta->query($consulta_categorias_cuentas);
            $resultado = $lista_categorias_cuentas->fetch_array(MYSQLI_BOTH);
            while ($fila_categoria_cuenta = $resultado) {
                $this->categoriacuenta[] = $fila_categoria_cuenta;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conecta->close();
        return $this->categoriacuenta;
    }

}
