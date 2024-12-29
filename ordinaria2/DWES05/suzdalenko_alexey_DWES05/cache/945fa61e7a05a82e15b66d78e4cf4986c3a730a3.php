 

<?php $__env->startSection('title', 'Instalation Page'); ?>

<?php $__env->startSection('content'); ?>
<div class="instalation">
    <h2>Instalación</h2>
    <form method="GET" action="instalacion.php">
        <input type="submit" value="Instalar Datos de Ejemplo" name="instalacion" class="input_instalacion" />
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>