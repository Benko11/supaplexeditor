<section class="mainMenu">
    <div class="level">Level <?php echo e($info['id']); ?></div>

    <div class="levels">Levels</div>

    <div class="details level-details">
        <input type="text" name="infotronsNeeded" maxlength="3" class="needed" value="<?php echo e($info['infotronsNeeded']); ?>">
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

        <br>
        <input type="text" name="name" class="text-white" placeholder="Name" maxlength="22" value="<?php echo e($info['niceName']); ?>">
    </div>

    <nav id="administration">
        <form action="" name="changes" method="post">
            <input type="hidden" name="gravity" value="<?php if($info['gravity']): ?> on <?php else: ?> off <?php endif; ?>">
            <input type="hidden" name="freezeZonks" value="<?php if($info['freezeZonks']): ?> on <?php else: ?> off <?php endif; ?>">
            <select name="elements" id="elements">
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hex=>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($elements_images[$hex]); ?>"><?php echo e($element); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button class="save" type="submit" name="submit">Save</button>
        </form>

        <a href="#" class="selection-button"><img src="/icons/cursor.png" alt="Mouse"></a>
        <a href="#" class="selection-button"><img src="/icons/empty-square.png" alt="Empty square"></a>
        <a href="#" class="selection-button"><img src="/icons/full-square.png" alt="Full square"></a>
    </nav>
</section>

<section class="mainMenuHolder"></section>