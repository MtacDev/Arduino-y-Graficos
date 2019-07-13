<?php

require 'conectBD.php';
$temp = $_GET["temp"];
$hume = $_GET["hume"];
$fech = $_GET["fech"];
$hora = $_GET["hora"];

$op= new OperacionesMysql();
$con = $op->conectar();
$sql = $op->InsertarDato($temp,$hume,$fech,$hora );
  mysqli_query($con,$sql) or die('No se inserto '. mysqli_error($con)); 
  echo '<script type="text/javascript">    
            var data = [1,2,3];       
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "graph.php",true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.send(1); //enviar datos  
            alert(xhr.responseText);
        </script>';
  
  return [
  '#theme' => 'item_list',
  '#list_type' => 'ul',
  '#items' => $hora,
  '#attributes' => ['class' => 'some_class'],
  '#attached' => [
    'library' => ['my_module/my_library'],
    'drupalSettings' => [
      'my_library' => [
        'some_variable1' => $temp,        // <== Variables passed
        'another_variable' => $hume,  // <== 
      ],
    ],
  ],
];
?>
