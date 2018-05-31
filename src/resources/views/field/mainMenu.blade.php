<nav id="administration">
    <form action="" name="changes" method="post">
        <button id="levels">Levels</button>
        <button id="save" type="submit" name="submit">Save ▼</button>

        <select name="" id="elements">
            <?php
            foreach ($elements as $hex=>$element) {
                echo '<option value="'.$elements_images[$hex].'">'.$element.'</option>';
            }
            ?>
        </select>
    </form>
</nav>