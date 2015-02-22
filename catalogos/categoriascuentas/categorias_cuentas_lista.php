<!DOCTYPE html>
<!-- inicio 17/02/2015 -->
<?php
include_once '../../config.php';
include_once INICIO.'catalogos/MetodosCatalogos.php';
include_once INICIO.'catalogos/categoriascuentas/CategoriasCuentas.php';

$cat_cuenta = new CategoriasCuentas();

$cat_cuenta->leerDatos();
print_r($cat_cuenta);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo INIIO; ?>css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php include_once '../../menu.php';?>
        <div class="container-fluid">
            <div class="row">
                <div class="span3 well-sm"></div>
                <div class="span3 well">
                    <div class="navbar navbar-inner block-header">
                        <a href="<?php echo INICIO;?>categorias_cuentas_crear.php" class="btn btn-success">Crear Nueva Categoría de Cuenta</a>
                    </div>
                    <div class="block-content collapse in">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Categoría</th>
                                <th>Clasificación Principal</th>
                                <th>Acción</th>
                            </tr>
                            <?php
                            foreach ($cat_cuenta as $cat) {
                                $id = $cat['idcategorias'];
                                echo"
                        <tr>
                        <td>" . $cat['idcategorias'] . "</td>
                        <td>" . $cat['categoria'] . "</td>
                        <td>" . $cat['nombre'] . "</td>
                        <td>" . '<a href="categorias_cuentas_procesar.php?idcategorias=' . $id . '">Editar</a> ' . "<td>
                        <td>" . '<a href="categorias_cuentas_procesar.php?idcategorias=' . $id . '">Eliminar</a>' . "</td>
                        </tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo INICIO;?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO;?>js/bootstrap.min.js"></script>
    </body>
</html>
