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
    $total = 0;

    $conexion = new mysqli('localhost', 'root', '', 'tienda');
    echo "<h1  style='text-align:center;'>Carrito de compras</h1>";
    echo "<center>";
    echo "<div class='card cflex'  style='width: 25rem;  padding:10px;'>";
    echo "<div>";
    echo "<table class='table  table-hover table-bordered'  >";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>Imagen</th>";
    echo "<th scope='col'>Producto</th>";
    echo "<th scope='col'>Precio</th>";
    echo " </tr>";
    echo "</thead>";
    echo "<tbody>";
    $salidaSQL = $conexion->query("SELECT * FROM carrito");
    $fila = $salidaSQL->fetch_assoc();

    while ($fila != null) {

        $resultado = $conexion->query("SELECT * FROM producto WHERE id = '{$fila['producto']}' ");
        $produc = $resultado->fetch_assoc();
        $total += floatval($produc['precio']);
        echo "<tr>";
        echo "<td><img src={$produc['imagen']} class='card-img-top' alt='...' style = 'width: 50px ; margin : auto'></td>";
        echo "<td>{$produc['nombre']}</td>";
        $nfmt = '¢' . number_format($produc['precio'], 2, ".", ".");
        echo "<td>{$nfmt}</td>";
        $fila = $salidaSQL->fetch_assoc();
    }
    echo "</tbody>";
    echo "</table>";
    $nfmtt = '¢' . number_format($total, 2, ".", ".");
    echo "<h2>Total {$nfmtt} </h2>";
    echo "<div class='cflex card' style='padding: 10px;'>";
    echo "<form action='cargaVenta.php' method='post'>";
    echo " <input type='submit' class='btn btn-primary' value='Pagar'</input>";
    echo "</form> ";
     echo "<a class='btn btn-primary' href='Productos.html'>Regresar a Página Principal</a>";
    echo "</div>";
    echo "</center>";
    mysqli_close($conexion);

    ?>
    <br>

</body>

</html>