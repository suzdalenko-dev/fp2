<?php $__env->startSection('title', 'Book Page'); ?>

<?php $__env->startSection('content'); ?>
<div class="list_books">
    <h2>Listado de Libros</h2>
</div>
<div class="search_books">
    <div style="padding: 11px;">
        <form class="" method="GET" action="libros.php">
            <input type="submit" value="Nuevo libro" name="add_new_book" class="add_book" />
        </form>
        <div class="books">
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Fecha</th>
                    <th>ISBN</th>
                    <th>Numero páginas</th>
                    <th>Tamaño</th>
                </tr>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($book['titulo']); ?></td>
                    <td><?php echo e($book['autor']); ?></td>
                    <td><?php echo e($book['genero']); ?></td>
                    <td><?php echo e($book['fecha_publicacion']); ?></td>
                    <td><?php echo e($book['isbn']); ?></td>
                    <td><?php echo e($book['numero_paginas']); ?></td>
                    <td><?php echo e($book['tamano_libro']); ?> MB</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>