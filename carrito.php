<!DOCTYPE html>
<html>
    <head>
        <title>Carrito</title>
        <meta charset="utf-8">
        <link href="estilocd.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </script>

    </head>
    <body>
 
    <?php
        $total=0;
         
        $conexion = new mysqli('localhost', 'root', '', 'tienda');
        echo "<h1  style='text-align:center;'>Carrito de compras</h1>";     
        if (isset($_COOKIE['carrito'])){
            $datos = explode(",",$_COOKIE['carrito']);   
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
            foreach ($datos as $dato){
                if ($dato>=1){
                    $resultado = $conexion->query("SELECT * FROM producto WHERE id = '{$dato}' ");
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
            echo "</tbody>";    
            echo "</table>";
            $nfmtt='¢'.number_format($total,2,".",".");
            echo "<h2>Total {$nfmtt} </h2>";
            echo "<div class='cflex card' style='padding: 10px;'>";
                                     echo "<form action='cargaVenta.php' method='post'>";
                            echo " <input type='submit' class='btn btn-primary' value='Pagar'</input>";
                        echo "</form> ";    
            echo "<a class='btn btn-primary' href='main.php'>Regresar a Página Principal</a> ";           
            echo "</div>";

            echo "</center>";
        }
        else {
            echo "<div class='cflex' style='padding: 10px;'>";
                echo "<h1>El carrito está vacío</h1>";
                echo "<a class='btn btn-primary' href='main.php'>Regresar a Página Principal</a> ";  
            echo "</div>";
        }
 
        mysqli_close($conexion);
   
    ?>
    <br>
 
    </body>   
</html>