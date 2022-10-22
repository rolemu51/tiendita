<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tarea Semana 2</title>
    <meta charset="utf-8">
</head>

<body>

    <?php
    $conexion = new mysqli('localhost', 'rolemu', '1234', 'tienda');
    if (isset($_POST['id'])) {
        $resultadoLogin = $conexion->query("SELECT * FROM usuario where id='{$_POST['id']}' and clave = '{$_POST['clave']}'");
    }

    $vNombre = "";
    $vApellidos = "";
    if ($conexion->error != '') {
        echo "<div class='alert alert-danger'>";
        echo "<strong>{$conexion->error}</strong>";
        echo "</div>";
    } else {
        if (!isset($_COOKIE['usuario'])) {
            $datosUsuarios = $resultadoLogin->fetch_assoc();
            if ($datosUsuarios != '') {
                $vNombre = $datosUsuarios['nombre'];
                $vApellidos = $datosUsuarios['apellidos'];
                setcookie("usuario", $_POST['id']);
                setcookie("nombre", $vNombre);
            }
        } else {
            $vNombre = $_COOKIE["nombre"];
        }
        if ($vNombre == null) {
            echo "<h1>Acceso no permitido</h1>";
        } else {
            echo "<center>";
            echo "<div class='container' style='padding: 10px; background-color: #26a;'  >";
            echo "<div class='row'>";
            echo "<div class='col'>";
            echo "<form action='cliente.php' method='post'>";
            echo "<input  type='submit' class='btn btn-link' value='Clientes'>";
            echo "</form>";
            echo "</div>";
            echo "<div class='col'>";
            echo "<form action='venta.php' method='post'>";
            echo "<input  type='submit' class='btn btn-link' value='Ventas'>";
            echo "</form>";
            echo "</div>";
            echo "<div class='col'>";
            echo "<form  action='compra.php' method='post'>";
            echo "<input  type='submit' class='btn btn-link' value='Compras'>";
            echo "</form> ";
            echo "</div>";
            echo "<div class='col'>";
            echo "<form  action='producto.php' method='post'>";
            echo "<input  type='submit' class='btn btn-link' value='Productos'>";
            echo "</form> ";
            echo "</div>";
            echo "<div class='col'>";
            echo "<form action='proveedor.php' method='post'>";
            echo "<input   type='submit' class='btn btn-link' value='Proveedores'>";
            echo "</form> ";
            echo "</div>";
            echo "<div class='col'>";
            echo "<form  action='consulta.php' method='post'>";
            echo "<input   type='submit' class='btn btn-link' value='Consultas'>";
            echo "</form> ";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</center>";
            echo "<center>";
            //Ejecuta la consulta.
            $productos = $conexion->query("SELECT * FROM producto");
            if ($conexion->error != '') {
                echo "<div class='alert alert-danger'>";
                echo "<strong>{$conexion->error}</strong>";
                echo "</div>";
            } 
            else {
                $datos = $productos->fetch_assoc();
                echo "<div class='cgrid' style='padding:20px; '>";
                while ($datos != null) {
                    echo "<div class='card' style='width: 25rem; background-color:white; color:black; margin:auto;'>";
                    echo "<div class='card-body cgrid-item' style='margin: 10px;'>";
                    echo "<img src={$datos['imagen']} class='card-img-top' alt='...' style = 'width: 100px ; margin : auto'>";
                    echo "<h5 class='card-title' name = 'name' style = 'margin: auto'>{$datos['nombre']}</h5>";
                    echo "<p class='card-text'>{$datos['detalle']}</p>";
                    $nfmt = '¢' . number_format($datos['precio'], 2, ".", ".");
                    echo "<p class='card-text'>Precio : {$nfmt} colones</p>";
                    echo "<p class='card-text'>Existencia : {$datos['existencia']}</p>";
                    echo "<br>";
                    //echo "<form id='form' action='post.php' method='post'>";
                     echo "<form id='form'>";
                        echo "<div class='cflex' style='background-color: #26a; margin:auto; padding:5px;'>";
                            echo "<label style='display:none'>id de producto</label>";
                            echo "<p><input name='id' type='number' class='btn btn-primary' value={$datos['id']} ' style='display:none' ></input></p>";
                            echo "<button id='boton' class='btn btn-primary' type='submit' onclick='agregaEnCarrito()'></button>"; 
                            echo "<div id='respuesta'>";
                            echo "</div>";
                        echo "</div>";
                    echo "</form> ";
                    echo "<p><input  type='submit' class='btn btn-primary' value='Borra carrito' onclick = 'fBorraCarrito();' ></p>";   
                    echo "<form action='carrito.php' method='post'>";
                    echo "<p><input type='submit' class='btn btn-primary' value='Ver carrito'/></p>";
                    echo "</form> ";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    $datos = $productos->fetch_assoc();
                }
                echo "</div>";
                echo "</center>";
            }
        }
    }
    mysqli_close($conexion);
    ?>



</body>
    <script src="app.js"></script>  
    <link href="estilocd.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

 
</html>