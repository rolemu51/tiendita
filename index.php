<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link href="estilocd.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </script>

    </head>
    <body> 
        <?php

            echo "<center>";  
                echo "<h2>Login de Usuario</h2>";
                echo "<div class='card cflex' style='width: 30rem; margin:auto;padding:20px; background-color: #26e; height:350px;'>";      
                    echo "<div class='card cflex' style='width: 25rem;  padding:20px; background-color: #48e; height: 250px;  '>";          
                        echo "<form action='main2.php' method='post'>";        
                        echo "<p><input type = 'text'  class='form-control' name = 'id'   placeholder='Digite usuario'></p>";                        
                            echo "<p><input type = 'password'  class='form-control' name = 'clave'   placeholder='Digite contraseña'></p>";                              
                            echo " <input type='submit' class='btn btn-primary' value='Ingresar'</input>";
                        echo "</form>";                        
                    echo "</div>";          
                echo "</div>";      
            echo "</center>";  
            
        ?>
    <br>
 
    </body>   
</html>