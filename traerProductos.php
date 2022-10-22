<?php
   
    $conexionProductos = new mysqli('localhost', 'rolemu', '1234', 'tienda');
 
    $salidaSQL = $conexionProductos->query("SELECT * FROM producto");
    $fila = $salidaSQL->fetch_assoc();

    $arrp = [];
    $indice=0;
    while ($fila != null) {
        $arrp[$indice]= json_encode($fila);
        $indice+=1;
        $fila = $salidaSQL->fetch_assoc();
    }

      if ($conexionProductos->error != '') {
         echo json_encode("error al leer productos") ; 
         
    }  
    else
    {     echo json_encode($arrp) ;  
         
    }  
    mysqli_close($conexionProductos);


?>