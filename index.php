<?php
include_once './config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titulo; ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
         <?php include_once 'menu.php'; ?>
        <script src="<?php echo INICIO; ?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo INICIO; ?>js/bootstrap.min.js"></script>
    </body>
</html>



