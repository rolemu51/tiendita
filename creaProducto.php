<!DOCTYPE html>
<html>
    <head>
        <title>Crea Producto</title>
        <meta charset="utf-8">
        <link href="estilocd.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </script>

    </head>
    <body>
        <?php
            echo "<h2>Recibiendo datos...</h2>";   
                $conexion = new mysqli('localhost', 'root', '', 'tienda');
                $resultado = $conexion->query("INSERT INTO producto (nombre,imagen,detalle,precio, existencia) VALUES ('{$_POST['nombre']}','{$_POST['imagen']}','{$_POST['detalle']}',{$_POST['precio']},{$_POST['existencia']})");
                if ($conexion->error != '') {
                    echo "Ocurrió un error al ejecutar la consulta: {$conexion->error}";
                }
                else
                    {
                    echo "<h1  style='text-align:center;'>Consulta de producto</h1>";     

                    echo "<center>"; 
                        echo "<div>";
                        
                            echo "<table class='table table-bordered'>";
                            echo "<thead>";
                                echo "<tr>"   ;
                                        echo "<th>Nombre</th>";  
                                        echo "<th>Imagen</th>";              
                                        echo "<th>Precio</th>"; 
                                        echo "<th>Existencia</th>"; 
                                        echo "<th>Detalle</th>";
                                echo " </tr>";
                            echo "</thead>" ;
                            echo "<tbody>" ;           
                                $resultado = $conexion->query("SELECT * FROM producto ");
                                if ($conexion->error != '') {
                                    echo "<div class='alert alert-danger'>";
                                    echo "<strong>{$conexion->error}</strong>"    ;
                                    echo "</div>" ;
                                    
                                }
                                else {
                                    $varnom = $resultado->fetch_assoc(); 
                                    while ($varnom != null ){ 
                                            echo "<tr>";
                                                echo "<td>{$varnom['nombre']}</td>";
                                                echo "<td>{$varnom['imagen']}</td>";
                                                $nfmt='¢'.number_format($varnom['precio'],2,".",".");
                                                echo "<td>{$nfmt}</td>";
                                                echo "<td>{$varnom['existencia']}</td>";
                                                echo "<td>{$varnom['detalle']}</td>";
                                            echo "</tr>";                       
                                            $varnom = $resultado->fetch_assoc(); 
                                    }
                                    echo "<div class='alert alert-success'>";
                                    echo "<strong>Producto grabado satisfactoriamente!</strong>"    ;
                                    echo "</div>" ;
                                }              
                                echo "</tbody>";    
                                echo "</table>";
                    
                            echo "<div class='cflex card' style='padding: 10px;'>";
                                echo "<a class='btn btn-primary' href='main.php'>Regresar a Página Principal</a> ";           
                            echo "</div>";
                        echo "</center>";
        
                        
                    }
                mysqli_close($conexion);
        ?>
</body>

</html>