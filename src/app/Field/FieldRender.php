<?php
spl_autoload_register(function($class) {
    require $class . '.php';
});

class FieldRender extends FieldBinary {
    public function __construct() {
        parent::__construct();
    }

    public function level() {
        echo '<table id="field" cellspacing="0" cellpadding="0"><tr>';

        $i = 0;
        foreach ($this->levelData() as $sector) {
            $element = $this->elements_images[$sector];
            echo '<td style="background:url(\'icons/'.$element.'.png\'"></td>';

            $i++;
            echo ($i % $this->width == 0) ? '</tr><tr>' : '';
        }
        echo '</tr></table>';
    }

    public function info() {
        ?>
        <section id="info">
            <header>Level Info</header>
            <p>
                <strong>Infotrons needed:</strong>
                <?php echo $this->infoData()['i_n'] ?>
            </p>
            <p>
                <strong>Infotrons available:</strong>
                <?php echo $this->infoData()['i_av'] ?>
            </p>

            <p>
                <strong>Electrons available:</strong>
                <?php echo $this->infoData()['e_av'] ?>
            </p>

            <p>
                <strong>Gravity:</strong>
                <?php echo ($this->infoData()['g']) ? 'ON' : 'OFF'  ?>
            </p>

            <p>
            <strong>Freeze zonks:</strong>
            <?php echo ($this->infoData()['f_z']) ? 'ON' : 'OFF'  ?>
            </p>
        </section>
<?php
    }
}