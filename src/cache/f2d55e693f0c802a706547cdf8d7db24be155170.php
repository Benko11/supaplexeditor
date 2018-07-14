<nav id="administration">
    <form action="" name="changes" method="post">
        <button id="levels">Levels</button>
        <button id="save" type="submit" name="submit">Save ▼</button>

        <select name="" id="elements">
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hex=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($elements_images[$hex]); ?>"><?php echo e($element); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </form>
</nav>