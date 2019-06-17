<?php

namespace App;

class Level
{
  /** @var int */
  protected $id;

  /** @var int */
  protected $width;

  /** @var int */
  protected $height;

  /** @var int */
  protected $grid;

  /** @var array */
  protected $levelBinary;

  /** @var array */
  private $info;

  /**
   * @param $width, $height
   * Level constructor that accepts level dimensions in its parameters.
   */
  public function __construct(int $width = null, int $height = null)
  {
    if ($width) {
      $this->width = $width;
    } else {
      $this->width = 60;
    }

    if ($height) {
      $this->height = $height;
    } else {
      $this->height = 24;
    }

    $this->grid = $this->width * $this->height;
  }

  /**
   * @param $id
   * @return void
   * Sets an attribute of $levelBinary to the binary clusters representing the level. Can
   * have other methods appended to it.
   */
  protected function select(int $id)
  {
    if (!($id > 0 && $id <= $this->capacity)) throw new \Exception("Number out of range: '$id' is not within the range of 1-{$this->capacity}");

    $this->id = $id;
    $start = ($this->id - 1) * $this->grid + 96 * ($this->id - 1);
    $this->levelBinary = array_slice($this->fileBinary, $start, $this->grid);

    return $this;
  }

  /**
   * @return App\Level
   * Sets an atrribute of $info to the binary clusters representing the information
   * (e.g. needed infotrons, name etc.) about the level. Can have other methods append to it.
   */
  public function info()
  {
    $start = $this->id * $this->grid + ($this->id - 1) * 96;
    $this->info = array_slice($this->fileBinary, $start, 96);
    return $this;
  }

  /**
   * @param $element
   * @return int
   * This function will return the number of elements present in a given level. If an unsupported file type is passed, it returns false.
   */
  protected function countElements(string $element)
  {
    $number = 0;

    foreach ($this->levelBinary as $cluster) {
      $name = elementsImages()[$cluster];

      if ($element == strtolower($name)) {
        ++$number;
      }
    }

    return $number;
  }

  /**
   * @return array
   * Returns the array of binary cluster forming the level.
   */
  public function render()
  {
    return $this->levelBinary;
  }

  /**
   * @return bool
   * Gets the gravity state from binary clusters.
   */
  public function gravity()
  {
    $this->setInfo();

    return !($this->info[4] == 0);
  }

  /**
   * @return bool
   * Gets the freeze zonks state from binary clusters.
   */
  public function freezeZonks()
  {
    $this->setInfo();

    return ($this->info[29] == 2);
  }

  /**
   * @return int
   * Gets the number of infotrons based on the requirement, if it is set to nothing, then just
   * gets the number of all infotrons within the level.
   */
  public function infotrons()
  {
    $this->setInfo();
    $cluster = hexdec($this->info[30]);

    return $cluster == 0 ? $this->allInfotrons() : $cluster;
  }

  /**
   * @return int
   * Gets the number of all infotrons available within the level.
   */
  public function allInfotrons()
  {
    return $this->countElements('infotron');
  }

  /**
   * @return string
   * Gets level name as is stated in the binary clusters.
   */
  public function classicName()
  {
    $this->setInfo();

    // First we retrieve the data clusters for the level name
    $name = array_slice($this->info, 6, 23);

    // Then we translate each binary cluster into character
    foreach ($name as $key => $cluster) {
      $name[$key] = pack('H*', $name[$key]);
    }

    // Lastly we will join the array into a string
    return join('', $name);
  }

  /**
   * @return string
   * Gets level name from binary clusters and formats the level name to a more readable form.
   */
  public function name()
  {
    $this->setInfo();

    $name = $this->classicName();
    $name = str_split($name);

    $letters = [];
    foreach ($name as $key => $character) {
      if (ctype_alpha($character) or $character == ' ') {
        $letters[] = $key;
      }
    }

    if (count($letters)) {
      $threshold = [min($letters), max($letters)];

      foreach ($name as $key => $character) {
        if ($key < $threshold[0] && $character == '-') {
          $name[$key] = '';
        }

        if ($key > $threshold[1] && $character == '-') {
          $name[$key] = '';
        }
      }
    }

    $name = implode('', $name);
    return trim($name);
  }

  /**
   * @return void
   * Sets the parameter of the info attribute if it has been not set yet.
   */
  private function setInfo()
  {
    if (!$this->info) $this->info();
  }

  /**
   * @return int
   * Gets width dimension of the level canvas. 
   */
  public function getWidth()
  {
    return $this->width;
  }

  /**
   * @return int
   * Gets height dimension of the level canvas.
   */
  public function getHeight()
  {
    return $this->height;
  }
}
