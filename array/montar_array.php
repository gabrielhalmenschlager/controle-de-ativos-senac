<?php 

//$array = array('primeira' => 1,2, 'terceira' => 32, 'wr' , 'teste');

/* $array = ['nome' => 'Gabriel',
          'idade' => '16',  
          'peso' => '65',

        ]; */

        //$array = ['Gabriel','16','65',];

        $array = array (
                         array (1,2,3,4,5,6,7,8,9),
                         array ('a','b','c','d','e'),
                         ['a'.'b','c',1,2,3,4,5,6,7,8,9],
                         'awqr',
                         '12'
                        );

echo "<pre>";
var_dump($array);
echo "</pre>";
echo "<br>";

?>