<?php

class LevelSave extends FieldBinary {
	/** @var array */
	private $level;

	public function __construct() {
		parent::__construct();

		$this->level = $this->fileData($this->file);

		$this->changeElements();
		$this->changeName();

		$file = fopen('LEVELS.DAT', 'w');
		fwrite($file, pack('H*', $this->level));
	}

	public function changeElements() {
		$changes = array();
		foreach ($_POST as $key=>$element) {
			if (substr($key, 0, 3) == 'el-') {
				$changeKey = substr($key, 3);
				$changes[$changeKey] = array_search($element, $this->elements_images);
			}
		}

		$beginning = ($this->levelId - 1) * $this->size + 96 * ($this->levelId - 1);
		foreach ($changes as $key=>$change) {
			$this->level[$beginning + $key] = $change;
		}

		return true;
	}

	public function changeName() {
		$name = trim($_POST['name']);
		$beginning = $this->levelId * $this->size + ($this->levelId - 1) * 96;
		$sectors = array_slice($this->level, $beginning, 96);

		$name = str_split($name);
		foreach ($name as $key=>$character) {
			$this->level[$beginning + $key] = unpack('H*', $character);
		}

		return true;
	}
}