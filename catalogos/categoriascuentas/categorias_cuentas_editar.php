<?php
include_once './CategoriasCuentas.php';
include_once '../../config.php';

$id = filter_input(INPUT_GET, 'idcategorias');

$cat_cuenta = new CategoriasCuentas();
$cate = $cat_cuenta->buscarPorId($id);

foreach ($cate as $cat) {
     $valor_nombre_categoria = $cat['categoria'];
     $valor_estructura_base = $cat['nombre'];
     $id_categoria = $cat['idcategorias'];                           
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo INICIO; ?>css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php include_once '../../menu.php';?>
        <div class="container-fluid">
            <div class="row">
                <div class="span3 well-sm"></div>
                <div class="span3 well">
                    <div class="block-content collapse in">
                        <form action="categorias_cuentas_procesar.php" method="POST">
                            <input type="text" value="editar" style="display:none" name="operacion"></input>
                            <input type="text" value="<?php echo $id_categoria; ?>" style="display:none" name="id_editar"></input>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre de la categoria</th>
                                <th><input type="text" name="nombre_categoria" placeholder=<?php echo $valor_nombre_categoria; ?>></th>
                            </tr>
                            <tr>
                                <th>Clasificacion Principal</th>
                                <th>
                                    <span>Actual: <?php echo $valor_estructura_base.'|';?></span>
                                    <span>Nuevo: </span>
                                    <select name="estructura_base">
                                    <?php  
                                    $est_base = new CategoriasCuentas();
                                    $estb = $cat_cuenta->listaEstructuraBase();
                                    
                                    foreach ($estb as $est){
                                        echo '<option value="'.$cest['idestructurabase'].'">'.$est['nombre'].'</option>';
                                    }  
                                    ?>    
                                    </select>
                                </th>
                            </tr>
                        </table>
                         <div class="navbar navbar-inner block-header">
                             <input type="submit" value="      Editar     ">
                        </div>
                      </form>
                    </div>
                    <?php 
                    
                    ?>
                    <div class="navbar navbar-inner block-header">
                        <a href="<?php echo INICIO;?>catalogos/categoriascuentas/categorias_cuentas_lista.php" class="btn btn-success">Volver a lista de Cuentas</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo INICIO;?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO;?>js/bootstrap.min.js"></script>
    </body>
</html>
