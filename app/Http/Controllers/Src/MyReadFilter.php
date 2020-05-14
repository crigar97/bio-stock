<?php

namespace App\Http\Controllers\Src;

use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class MyReadFilter implements IReadFilter
{
    private $startRow;
    private $endRow;
    private $columns;

    /**  Get the list of rows and columns to read  */
    public function __construct() {
      $this->startRow = 1;
      $this->endRow   = 100;
      $this->columns  = $this->rangeColumns('A', 'AO');
    }

    public function readCell($column, $row, $worksheetName = '') {
      //  Only read the rows and columns that were configured
      if ($row >= $this->startRow && $row <= $this->endRow) {
        if (in_array($column,$this->columns)) {
          return true;
        }
      }
      return false;
    }

    public function rangeColumns($startColumn, $endColumn) {
      /** This method only admit a range from A to AZ */
      $range = range($startColumn, 'Z');
      $abc = range('A', 'Z');
      $secondChar = substr($endColumn, -1);
      $asciiSecondChar = ord($secondChar);
      $asciiA = ord('A');
      $rangeFromAToSecondChar = $asciiSecondChar - $asciiA;
      for ($i = 0; $i <= $rangeFromAToSecondChar; $i++) {
        $range[] = 'A' . $abc[$i];
      }
      return $range;
    }
}