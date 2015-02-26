<?php

/*
 * Inicio 25/02/2015
 */

include_once './CategoriasCuentas.php';

$operacion = filter_input(INPUT_POST, 'operacion');

$cat_cta = new CategoriasCuentas();

switch ($operacion) {
    case 'crear':
        $cat_cta->setCategoriacuenta(filter_input(INPUT_POST, 'categoriacuenta'));
        $cat_cta->setIdestructurabase(filter_input(INPUT_POST, 'idestructurabase'));
        print_r($cat_cta);
        if (isset($cat_cta)) {
            try {
                $cat_cta->crearRegistro($cat_cta);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            header("Location: ".INICIO."catalogos/categoriascuentas/categorias_cuentas_lista.php");
        } else {
            echo 'Error al crear materia';
        }

        break;

    default:
        break;
}