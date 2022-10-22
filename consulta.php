<!DOCTYPE html>
<html>
    <head>
        <title>Consultas de usuarios</title>
        <meta charset="utf-8">
        <link href="estilocd.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        </script>
         
        <script type="text/javascript" src="funcionesjs.js"></script>
    </head>
    <body>   
         <?php
            echo "<center>";  
                echo "<h2>Formulario de Consulta</h2>";
                echo "<div class='card cflex' style='width: 30rem; margin:auto;padding:20px; background-color: #26e; height:550px;'>";      
                    echo "<div class='card cflex' style='width: 25rem;  padding:20px; background-color: #48e; height: 450px;  '>";          
                        echo "<form action='recibeConsulta.php' method='post'>";          
                            echo "<p><input type = 'text' class='form-control' name = 'nombre'   placeholder='Nombre'></p>";                        
                            echo "<p><input type = 'email'  class='form-control' name = 'email'   placeholder='Email'></p>";                    
                            echo "<p><input type = 'phone'  class='form-control' name = 'telefono'   placeholder='Teléfono'></p>";                    
                            echo "<p><textarea class='form-control' name='detalle' rows='5' cols='50'> </textarea> </p>";                     
                            echo " <input type = 'submit'  class='btn btn-primary' value='Enviar consulta' ></input>";                              
                        echo "</form>";              
                        echo "<form action='main.php' method='post'>";
                            echo " <input type='submit' class='btn btn-link' value='Regresar a página principal'</input>";
                        echo "</form> ";            
                    echo "</div>";          
                echo "</div>";      
            echo "</center>";  
        ?>
    </body>   
</html>