<!DOCTYPE html>
<?php
include_once './GruposCuentas.php';
include_once '../../config.php';

$gru_cuenta = new GruposCuentas();

$grup = $gru_cuenta->leerDatos();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo INICIO; ?>css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php include_once '../../menu.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="span3 well-sm"></div>
                <div class="span3 well">
                    <div class="navbar navbar-inner block-header">
                        <a href="grupos_cuentas_crear.php" class="btn btn-success">Crear Nuevo Grupo de Cuenta</a>
                    </div>
                    <div class="block-content collapse in">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Grupo</th>
                                <th>Nivel</th>
                                <th>Grupo Superior</th>
                                <th>Categoría</th>
                                <th>Acción</th>
                            </tr>
                            <?php
                            if (!isset($grup)) {
                                echo '<table><tr><th><h1><center>No hay datos</center></h1></th></tr></table>';
                            } else {
                                foreach ($grup as $gru) {
                                    $id = $gru['idgruposcuentas'];
                                    echo"
                        <tr>
                        <td>" . $gru['idgruposcuentas'] . "</td>
                        <td>" . $gru['grupo'] . "</td>
                        <td>" . $gru['nivel'] . "</td>
                        <td>" . $gru['gruposuperior'] . "</td>
                        <td>" . $gru['categoriacuenta'] . "</td>
                        <td>" . '<a href="grupos_cuentas_procesar.php?idgruposcuentas=' . $id . '">Editar</a> -- <a href="grupos_cuentas_procesar.php?idgruposcuentas=' . $id . '&operacion=desactivar">Inactivar</a>' . "</td>
                        </tr>";
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo INICIO; ?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO; ?>js/bootstrap.min.js"></script>
    </body>
</html>
