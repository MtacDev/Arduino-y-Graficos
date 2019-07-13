<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        require_once 'conectBD';
        $op= new OperacionesMysql();
        $con= $op->conectar();
        $sql = $op->InsertarDato($temp, $hume);
        $row = mysqli_query($con,$sql) or die('No se inserto '. mysqli_error($con)); 
         
         	$json_array=array();
	
	while($row=mysqli_fetch_assoc($records))
	{
		$json_array[]=$row;
		
	}
		/*echo '<pre>';
		print_r($json_array);
		echo '</pre>';*/
	echo json_encode($json_array);
        
        ?>
    </body>
</html>
