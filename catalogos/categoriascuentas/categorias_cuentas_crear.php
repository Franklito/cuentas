<?php
include_once '../../Conexion.php';
include_once '../../config.php';
$conecta = Conexion::open();

$consulta_estructura_base = "SELECT * FROM estructurabase";
$lista_estructura_base = mysqli_query($conecta, $consulta_estructura_base);
?>
<!DOCTYPE html>
<!-- INICIO 23/02/2015 -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Categoría Cuenta Crear</title>
        <link rel="stylesheet" href="<?php echo INICIO; ?>css/bootstrap.min.css">
    </head>
    <body>
        <?php include_once '../../menu.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-7 col-sm-offset-2 col-md-offset-3">
                    <form class="form-horizontal" action="categorias_cuentas_procesar.php" method="post" role="form">
                        <fieldset>
                            <h2>Crear Categoría Cuenta</h2>
                            <hr class="colorgraph col-sm-8">
                            <div style="display:none"><input type="text" value="<?php echo 'crear'; ?>" name="operacion"></div>
                            <div class="form-group col-sm-10">
                                <label class="control-label col-sm-4" for="categoriacuenta">Categoría Cuenta</label>
                                <div class="controls col-sm-6">
                                    <input type="text" class="form-control" id="categoriacuenta" name="categoriacuenta" placeholder="Categoria Cuenta" autofocus="true">
                                </div>
                            </div>
                            <div class="form-group col-sm-10">
                                <label for="idestructurabase" class="control-label col-sm-4">Estructura Base</label>
                                <div class="controls col-sm-6">
                                    <select class="form-control" name="idestructurabase" id="idestructurabase">
                                        <?php
                                        while ($fila = mysqli_fetch_array($lista_estructura_base)) {
                                        ?>
                                        <option value="<?php echo $fila['idestructurabase']; ?>"><?php echo $fila['nombre']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <hr class="colorgraph col-sm-8">
                        <div class="row">
                            <div class="col-xs-6 col-lg-6 col-md-6 col-sm-offset-2">
                                <input type="submit" value="Guardar" name="submit" class="btn btn-success">
                                <button type="reset" onclick="location.href = 'categorias_cuentas_lista.php'" class="btn btn-success col-sm-offset-2">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
