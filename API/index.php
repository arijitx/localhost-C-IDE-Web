<?php
   $arr = array('name' => "hello", 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

header('Content-Type: application/json');

   echo json_encode($arr);

?>