<!DOCTYPE html>
<html>

<head>
    <title>Tarea Semana 2</title>
    <meta charset="utf-8">
    <link href="estilocd.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!--   <script type="text/javascript" language="javascript"
                src="preg1asig3.js"> -->
    </script>
</head>

<body>
    <script>
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        function fAgregaCookie(id) {
            if (getCookie("carrito") != "") {
                setCookie("carrito", getCookie("carrito") + "," + id, 60);
            } else {
                setCookie("carrito", id, 60);
            }
        }

        function fBorraCarrito() {
            setCookie("carrito", "1", -10);
        }
    </script>
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
                    echo "<div class='cflex' style='background-color: #26a; margin:auto; padding:5px;'>";
                    echo "<p><input  type='submit' class='btn btn-primary' value='Añade a carrito' onclick = 'fAgregaCookie({$datos['id']});' ></p>";
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

</html>