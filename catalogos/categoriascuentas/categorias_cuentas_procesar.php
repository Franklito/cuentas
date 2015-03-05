<?php

/*
 * Inicio 25/02/2015
 */

include_once './CategoriasCuentas.php';

$post = filter_input(INPUT_POST, 'operacion');
$get = filter_input(INPUT_GET, 'operacion');

if (!empty($get)) {
    $operacion = $get;
    $imput = INPUT_GET;
} else if (!empty($post)) {
    $operacion = $post;
    $imput = INPUT_POST;
}

$cat_cta = new CategoriasCuentas();

switch ($operacion) {
    case 'crear':
        $cat_cta->setCategoriacuenta(filter_input($imput, 'categoriacuenta'));
        $cat_cta->setIdestructurabase(filter_input($imput, 'idestructurabase'));

        if (isset($cat_cta)) {
            try {
                $cat_cta->crearRegistro($cat_cta);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            header("Location: " . INICIO . "catalogos/categoriascuentas/categorias_cuentas_lista.php");
        } else {
            echo 'Error al crear materia';
        }

        break;
        
        case 'editar':
        $cat_cta->setCategoriacuenta(filter_input($imput, 'categoriacuenta'));
        $cat_cta->setIdestructurabase(filter_input($imput, 'idestructurabase'));

        if (isset($cat_cta)) {
            try {
                $cat_cta->crearRegistro($cat_cta);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            header("Location: " . INICIO . "catalogos/categoriascuentas/categorias_cuentas_lista.php");
        } else {
            echo 'Error al crear materia';
        }

        break;
        
    case 'desactivar':
        $cat_cta->setIdcategoriacuenta(filter_input($imput, 'idcategoriacuenta'));
        if (isset($cat_cta)) {
            try {
                $cat_cta->inactivar($cat_cta);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            header("Location: " . INICIO . "catalogos/categoriascuentas/categorias_cuentas_lista.php");
        } else {
            echo 'Error al desactivar';
        }

    default:
        break;
}