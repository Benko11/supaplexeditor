<?php
class LevelSave extends FieldBinary {
	/** @var array **/
	private $level;

	/** @var int **/
	private $limit;

	public function __construct() {
		parent::__construct();

		$this->limit = 23;

		$this->level = $this->fileData();
		
		$this->changeElements();
		$this->changeProperties();
		$this->changeName();
		$this->apply();
	}

	public function changeElements() {
		$changes = array();
		foreach ($_POST as $key=>$element) {
			if (substr($key, 0, 3) == 'el-') {
				$changeKey = substr($key, 3);
				$changes[$changeKey] = array_search($element, $this->elements_images);
			}
		}

		foreach ($changes as $key=>$change) {
			$this->level[$this->sectors['level'] + $key] = $change;
		}
	}

	public function changeProperties() {
		$this->level[$this->sectors['info'] + 4] = (trim(strtolower($_POST['gravity'])) == 'on') ? '01' : '00';
		$this->level[$this->sectors['info'] + 29] = (trim(strtolower($_POST['freezeZonks'])) == 'on') ? '02' : '00';
	}

	public function formatName() {
		$name = trim($_POST['name']);
		$length = strlen($name);
		if ($length > $this->limit) {
			$name = substr($name, 0, $this->limit);
		}

		$remainder = $this->limit - $length;
		$dashRemainder = $remainder / 2 - 1;

		$formattedName = '';
		if (is_int($dashRemainder)) {
			for ($i = 0; $i < $dashRemainder; $i++) {
				$formattedName .= '-';
			}

			$formattedName .= ' '.strtoupper($name).' ';

			for ($i = 0; $i < $dashRemainder; $i++) {
				$formattedName .= '-';
			}
		} else {
			$numberOfDashes = floor($dashRemainder);
			for ($i = 0; $i < $numberOfDashes; $i++) {
				$formattedName .= '-';
			}

			$formattedName .= ' '.strtoupper($name).' ';

			$numberOfDashes = ceil($dashRemainder);
			for ($i = 0; $i < $numberOfDashes; $i++) {
				$formattedName .= '-';
			}
		}
		return $formattedName;
	}

	public function changeName() {
		$name = $this->formatName();
		$splitName = str_split($name);

		foreach ($splitName as $key=>$character) {
			$this->level[$this->sectors['info'] + 6 + $key] = unpack('H*', $character)[1];
		}
	}

	public function apply() {
		// merge everything into one binary string and save
		$this->level = join('', $this->level);
		$file = fopen($this->fileName, 'w');
		fwrite($file, pack('H*', $this->level));
		fclose($file);
	}
}