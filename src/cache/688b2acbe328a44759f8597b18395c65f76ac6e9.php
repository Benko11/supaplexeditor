<?php $__env->startSection('content'); ?>
    <section class="level">
        <?php echo $level; ?>

    </section>

    <?php echo $__env->make('field.mainMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('field.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>