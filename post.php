<?php
    
    $idproducto = $_POST['ide'];
    $cantidad=1;
    $linea=1;
    $usuario=$_COOKIE['usuario'];
    $conexionCarrito = new mysqli('localhost', 'rolemu', '1234', 'tienda');
    $fecha = date ( 'Y' ). date('m').date ('d');
    $arrCarrito[ ]="";
    
    $resultadocarrito = $conexionCarrito->query("INSERT INTO carrito  ( cantidad,fecha,linea,producto,usuario )
                           VALUES ({$cantidad},' {$fecha} ',  {$linea} , {$idproducto} ,'{$usuario}')");
/*        if ($conexionCarrito->error != '') {
         echo json_encode ("error")  ;   
    }  
    else
    { 
        $salidaSQL = $conexionCarrito->query("SELECT * carrito");
        if ($conexionRegCarrito->error == ''){
          $indice=0;
          $registrosCarrito = $salidaSQL->fetch_assoc(); 
                foreach ($registrosCarrito as $registro){
                    $arrCarrito[$indice]=json_encode($registro);
                    $indice+=1;  
                    $registrosCarrito = $salidaSQL->fetch_assoc(); 
              }
        }  
        echo   json_encode($arrCarrito)  ;     
    }   */  
    mysqli_close($conexionCarrito);
?>