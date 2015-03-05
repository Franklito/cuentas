<?php

include_once '../../Conexion.php';
include_once '../MetodosCatalogos.php';

class GruposCuentas implements MetodosCatalogos {
    
    private $idgruposcuentas;
    private $grupo;
    private $nivel;
    private $idgruposuperior;
    private $idcategorias;
    
    function __construct() {
        
    }

    function getIdgruposcuentas() {
        return $this->idgruposcuentas;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getIdgruposuperior() {
        return $this->idgruposuperior;
    }

    function getIdcategorias() {
        return $this->idcategorias;
    }

    function setIdgruposcuentas($idgruposcuentas) {
        $this->idgruposcuentas = $idgruposcuentas;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setIdgruposuperior($idgruposuperior) {
        $this->idgruposuperior = $idgruposuperior;
    }

    function setIdcategorias($idcategorias) {
        $this->idcategorias = $idcategorias;
    }

        
    public function activar($id) {
        
    }

    public function buscarPorId($id) {
        
    }

    public function crearRegistro($clase) {
        
    }

    public function editarRegistro($clase) {
        
    }

    public function eliminar($id) {
        
    }

    public function inactivar($id) {
        
    }

    public function leerDatos() {
        $conecta = Conexion::open();
        try {
            $consulta_grupos_cuentas = "SELECT * FROM grupos_cuentas_view where activo=0";
            $lista_grupos_cuentas = $conecta->query($consulta_grupos_cuentas);
            while ($fila_grupo_cuenta = $lista_grupos_cuentas->fetch_array(MYSQLI_ASSOC)) {
                $this->gruposcuenta[] = $fila_grupo_cuenta;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conecta->close();
        return $this->gruposcuenta;
    }

}

