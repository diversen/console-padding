<?php

// You don't need this if auto-loading is set correct up
include_once "./padding.php";

use diversen\padding;

$p = new padding();

$ary = array(
    array('1. column 1. ro', 'some details', 'andsome more details', '0'),
    array('1. column 2. ro', 'andsome more details'),
);

// Default
echo "Default settings:\n";
echo $p->padArray($ary);
echo "\n";
echo "User defined settings:\n";
// Change init of row, between row, and end of row
echo $p->padArray($ary, $begin_row = ' | ', $between_row = ' | ', $rowend = "\n");
echo "\n";

/*
Yields: 
  Default settings: 

    1. column 1. ro  some details          andsome more details  0  
    1. column 2. ro  andsome more details  

  User defined settings:

   | 1. column 1. ro | some details         | andsome more details | 0 | 
   | 1. column 2. ro | andsome more details | 
 * 
 */
