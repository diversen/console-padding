<?php

namespace diversen;

class padding {
    
    public $numColumns = 0;
    public $columnWidths = [];
    
    /**
     * Pad an array of arrays
     * @param array $ary
     * @param string $init string to init each row width
     * @param string $between string between every column
     * @param string $endrow string to end each row with
     * @return string $str the padded array as string
     */
    public function padArray ($ary, $init = '  ' , $between = '  ', $endrow = "\n") {
        
        $str = '';        
        $widths = $this->getColumnsWidth($ary);

        foreach ($ary as $row) {
            $str.= $init . $this->getPaddedLine($row, $between, $widths) . $endrow;
        }
        return $str;
    }
    
    /**
     * Return a single padded row
     * @param array $row
     * @param string $between string between every column 
     * @param array $widths an array of the column widths
     * @return string $str the padded row
     */
    public function getPaddedLine($row, $between, $widths) {
        $str = '';
        foreach($row as $key => $line) {
            $width = $widths[$key];
            $str.= str_pad($line, $width) . $between; 
        }
        return $str;
        
    }
    
    /**
     * Return number of columns in array 
     * @param array $ary
     * @return int $num_cols the number of columns
     */
    public function getNumColumns ($ary) {
        $num_cols = 0;
        foreach($ary as $key => $val) {
            $cols = count($val);
            if ($cols > $num_cols) {
                $num_cols = $cols;
            }
        }
        return $num_cols;
    }
    
    /**
     * Get an array with the column as key and the length as value
     * @param array $ary
     * @return array $ret an array of length of columns
     */
    public function getColumnsWidth ($ary) {
        $ret = [];
       
        $num = $this->getNumColumns($ary);
        $i = 0;
        while ($num) {
            $ret[$i] = $this->getColumnMaxLength($ary, $i);
            $num--;
            $i++;
        }

        return $ret;
    }
    
    /**
     * Get a columns max width based on key index
     * @param array $rows initial rows
     * @param int $index the column index
     * @return int $max_width the most wide column data
     */
    public function getColumnMaxLength ($rows, $index) {
        
        $max_width = 0;
        foreach($rows as $val) {
           
            if (!isset($val[$index])) {
                continue;
            }

            $width = $this->getStrLength($val[$index]);
            if ($width > $max_width){
                $max_width = $width;
            }
        }
        return $max_width;
    }
    
    /**
     * Get string length
     * @param string $str
     * @param string $color
     * @return int $length
     */
    public function getStrLength ($str) {
        $length = mb_strlen($str);
        return $length;
    }
}
