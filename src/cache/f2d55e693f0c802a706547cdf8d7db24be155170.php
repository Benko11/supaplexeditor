<section class="mainMenu">
    <div class="level">Level <?php echo e($info['id']); ?></div>
    <div class="levels">Levels</div>

    <div class="details level-details">
        <span class="needed" id="infotrons"><?php echo e($info['infotronsNeeded']); ?></span>
        <span class="available" id="infotronsAvailable"><?php echo e($info['infotronsAvailable']); ?></span><br>

        <?php if($info['gravity']): ?>
        <div class="on gravity">Gravity</div><br>
        <?php else: ?>
        <div class="off gravity">Gravity</div><br>
        <?php endif; ?>

        <?php if($info['freezeZonks']): ?>
        <div class="on freezeZonks">Freeze Zonks</div>
        <?php else: ?>
        <div class="off freezeZonks">Freeze Zonks</div>
        <?php endif; ?>
    </div>

    <nav id="administration">
        <form action="" name="changes" method="post">
            <input type="hidden" name="gravity" value="<?php if($info['gravity']): ?> on <?php else: ?> off <?php endif; ?>">
            <select name="elements" id="elements">
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hex=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($elements_images[$hex]); ?>"><?php echo e($element); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button class="save" type="submit" name="submit">Save</button>
        </form>
    </nav>
</section>

<section class="mainMenuHolder"></section>