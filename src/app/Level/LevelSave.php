<?php

class LevelSave extends FieldBinary {
	/** @var array */
	private $oldLevel;

	/** @var array */
	private $newLevel;

	public function __construct() {
		parent::__construct();

		$this->oldLevel = $this->fileData('LEVELS.DAT');
		$this->newLevel = $this->fileData('LEVELS.DAT');

		$changes = array();
		foreach ($_POST as $key=>$element) {
			if (substr($key, 0, 3) == 'el-') {
				$changeKey = substr($key, 3);
				$changes[$changeKey] = array_search($element, $this->elements_images);
			}
		}

		$beginning = ($this->levelId - 1) * $this->size + 96 * ($this->levelId - 1);
		foreach ($changes as $key=>$change) {
			$this->newLevel[$beginning + $key] = $change;
		}

		$this->newLevel = join('', $this->newLevel);

		$file = fopen('LEVELS.DAT', 'w');
		fwrite($file, pack('H*', $this->newLevel));
	}
}