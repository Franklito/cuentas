<?php

include_once './CategoriasCuentas.php';

$cat_cuenta = new CategoriasCuentas();
//$cate = $cat_cuenta->leerDatos();

$post = filter_input(INPUT_POST, 'operacion'); 
$get = filter_input(INPUT_GET, 'operacion');

if(!empty($get)){
    $operacion = $get;
    
}else if(!empty($post)){
    $operacion = $post;
}

switch($operacion){
    case 'inactivar':
    $id_categoria = filter_input(INPUT_GET, 'idcategorias');
    if(!empty($id_categoria)){
        $cat_cuenta = new CategoriasCuentas();
        $cat_cuenta->activarDesactivarCatalogo($id_categoria);
        
        header("Location: categorias_cuentas_lista.php");
     }   
     break;
     
      case 'crear':
          
      $cat_cuenta->setCategoria(filter_input(INPUT_POST, 'nombre_categoria'));
      $cat_cuenta->setIdEstructurabase(filter_input(INPUT_POST, 'estructura_base'));
        
         if(isset($cat_cuenta)){
              $cat_cuenta->crearRegistro($cat_cuenta);
              
        header("Location: categorias_cuentas_lista.php");
                     }
     break;
     
     case'editar':
         
     $cat_cuenta->setCategoria(filter_input(INPUT_POST, 'nombre_categoria'));
     $cat_cuenta->setIdEstructurabase(filter_input(INPUT_POST, 'estructura_base'));
     $id = filter_input(INPUT_POST, 'id_editar');
     
      if (isset($cat_cuenta)) {              
            $cat_cuenta->editarRegistro($cat_cuenta,$id);
                        
        header("Location: categorias_cuentas_lista.php");
      }
      
    break;
     
    
}



