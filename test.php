<?php

// You don't need this if auto-loading is set correct up
include_once "./Padding.php";

use Diversen\Padding;

$p = new Padding();

$ary = array(
    array('Some text', 'and some more text', 'more and more detailts', 'and one more'),
    array('A test', 'Another', 'and the last test'),
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
  Some text  and some more text  more and more detailts  and one more  
  A test     Another             and the last test       

User defined settings:
 | Some text | and some more text | more and more detailts | and one more | 
 | A test    | Another            | and the last test      |


 */
