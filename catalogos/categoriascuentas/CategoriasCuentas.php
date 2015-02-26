<?php

/*
 * Inicio 17/02/2015
 */
include_once '../../config.php';
require_once '../../Conexion.php';
require_once '../MetodosCatalogos.php';

class CategoriasCuentas implements MetodosCatalogos {
    private $categoriacuenta;
    private $idestructurabase;
    
    private $listaestructurabase;

    public function __construct() {
        
    }
    
    public function getCategoria() {
        return $this->idestructurabase;
    }
    
    public function getIdEstructurabase() {
        return $this->idcategoriacuenta;
    }

    public function setCategoria($categoriacuenta) {
        $this->categoriacuenta = $categoriacuenta;
    }
    
     public function setIdEstructurabase($idestructurabase) {
        return $this->idestructurabase = $idestructurabase;
    }


    public function buscarPorId($id) {
        $conecta = Conexion::open();
        try {
            $consulta_id_categorias_cuentas = "SELECT * FROM categorias_cuentas_view WHERE idcategorias = $id";
            $lista_id_categorias_cuentas = $conecta->query($consulta_id_categorias_cuentas);
            while ($fila_categoria_cuenta = $lista_id_categorias_cuentas->fetch_array(MYSQLI_ASSOC)) {
                $this->categoriacuenta[] = $fila_categoria_cuenta;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->categoriacuenta;
        
    }

    public function crearRegistro($cat_cuentas) {
            $conecta = Conexion::open();
            try{
                $crear_categorias_cuentas = "INSERT INTO categoriascuentas (categoria,idestructurabase,estado)VALUES ('$cat_cuentas->categoriacuenta',$cat_cuentas->idestructurabase,1)";
                $conecta->query($crear_categorias_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
    }

    public function editarRegistro($cat_cuentas,$id) {
        $conecta = Conexion::open();
            try{
                $editar_categorias_cuentas = "UPDATE categoriascuentas SET categoria = '$cat_cuentas->categoriacuenta',idestructurabase = $cat_cuentas->idestructurabase WHERE idcategorias =$id";
                $conecta->query($editar_categorias_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
        
    }

    public function leerDatos() {
        $conecta = Conexion::open();
        try {
            $consulta_categorias_cuentas = "SELECT * FROM categorias_cuentas_view WHERE estado = 1";
            $lista_categorias_cuentas = $conecta->query($consulta_categorias_cuentas);
            while ($fila_categoria_cuenta = $lista_categorias_cuentas->fetch_array(MYSQLI_ASSOC)) {
                $this->categoriacuenta[] = $fila_categoria_cuenta;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $this->categoriacuenta;
    }

    public function activarDesactivarCatalogo($id) {
        $conecta = Conexion::open();
            try{
                $editar_categorias_cuentas = "UPDATE categoriascuentas SET estado = 0 WHERE idcategorias =$id";
                $conecta->query($editar_categorias_cuentas);
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
    }
    
    public function listaEstructuraBase() {
        $conecta = Conexion::open();
            try{
                $consulta_estructura_base = "SELECT * FROM estructurabase ";
                $lista_estructura_base = $conecta->query($consulta_estructura_base);
                while ($fila_estructura_base = $lista_estructura_base->fetch_array(MYSQLI_ASSOC)) {
                $this->listaestructurabase[] = $fila_estructura_base;
            }
            }catch(Exception $exc){
                echo $exc->getTraceAsString();
            }
            return $this->listaestructurabase;
    }
}


