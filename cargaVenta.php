<!DOCTYPE html>
<html>
    <head>
        <title>Carga Venta</title>
        <meta charset="utf-8">
        <link href="estilocd.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </script>

    </head>
    <body>
 
    <?php
        $total=0;
        $errorTransaccion=0;
        //$fecActual = date();
        $conexion = new mysqli('localhost', 'root', '', 'tienda');
        $estado='R';
        $fechaActual = date ( 'Y' ). date('m').date ('d');
        $resultadoventa = $conexion->query("INSERT INTO venta  (fecha,estado ) VALUES ('{$fechaActual}','{$estado}')");
     
        if ($conexion->error != '') {
            echo "Ocurrió un error al cargar la venta: {$conexion->error}";
            $errorTransaccion =1 ;
        }
        else {
            $resNuevaVenta = $conexion->query("Select max(id) from venta");
            if ($conexion->error != '') {
                echo "No se pudo recuperar la venta {$conexion->error}";
                $errorTransaccion =1 ;
            }
            else{
                $idVentaCreadas = $resNuevaVenta->fetch_assoc();  
                foreach ($idVentaCreadas as $idVentaCreada) {
                    $idv = $idVentaCreada;
                }    
                $datos = explode(",",$_COOKIE['carrito']);  
                foreach ($datos as $dato){
                    if ($dato>=1){
                        $ResprecioProducto = $conexion->query("Select precio from producto where id= '{$dato}'");
                        if ($conexion->error != '') {
                            echo "No se pudo recuperar precio del producto {$conexion->error}";
                            $errorTransaccion =1 ;
                        }
                        else {
                            $precioProducto = $ResprecioProducto->fetch_assoc(); 
                            foreach ($precioProducto as $preciop) {
                                $preciopr = $preciop;
                            }
    
                            $cantidad=1;
                            $idp = $dato;
                            $resultadoDetalleVenta = $conexion->query("INSERT INTO detalleventa (cantidad, idProducto , idVenta , precio ) VALUES ({$cantidad},{$idp},{$idv},{$preciopr})");
                            if ($conexion->error != '') {
                                echo "No se pudo insertar detalle de venta {$conexion->error}";
                                $errorTransaccion =1 ;
                            }   
 
                        }
                    }
                }

            }
        }
  
        if ($errorTransaccion==0){
            echo "<h1  style='text-align:center;'>Pago realizado exitosamente</h1>";   
            echo "<h1  style='text-align:center;'>Factura No {$idv} </h1>";   
            echo "<center>"; 
            echo "<div class='card cflex'  style='width: 25rem;  padding:10px;'>";
            echo "<div>";
            echo "<table class='table  table-hover table-bordered'  >";
            echo "<thead>";
            echo "<tr>"   ;
            echo "<th scope='col'>Imagen</th>";  
            echo "<th scope='col'>Producto</th>";              
            echo "<th scope='col'>Precio</th>";  
            echo " </tr>"   ;
            echo "</thead>" ;
            echo "<tbody>" ;    
            $datos = explode(",",$_COOKIE['carrito']);     
            foreach ($datos as $dato){
                if ($dato>=1){
                    $resultado = $conexion->query("SELECT detalleventa.precio, nombre, imagen FROM detalleventa, producto WHERE idproducto = producto.id and idVenta = {$idv} and producto.id = {$dato} " );
                     if ($conexion->error != '') {
                        echo "No se pudo obtener el detalle de la venta {$conexion->error}";
                        $errorTransaccion =1 ;
                    }   
                    else {
                        $varnom = $resultado->fetch_assoc(); 
                        $total+= floatval($varnom['precio']);  
                        echo "<tr>";
                        echo "<td><img src={$varnom['imagen']} class='card-img-top' alt='...' style = 'width: 50px ; margin : auto'></td>";
                        echo "<td>{$varnom['nombre']}</td>";
                        $nfmt='¢'.number_format($varnom['precio'],2,".",".");                        
                        echo "<td>{$nfmt}</td>";
                        echo "</tr>";
                    }

                }
            }
            
            echo "</tbody>";    
            echo "</table>";
            $nfmtt='¢'.number_format($total,2,".",".");   
            echo "<h2>Total {$nfmtt} </h2>";
            echo "<div class='cflex card' style='padding: 10px;'>";
 
            echo "<a class='btn btn-primary' href='main.php'>Regresar a Página Principal</a> ";           
            echo "</div>";

            echo "</center>";
        }

 
        mysqli_close($conexion);
   
    ?>
    <br>
 
    </body>   
</html>