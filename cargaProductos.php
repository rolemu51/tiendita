<html>
    <head>
        <title>Lectura de datos en JavaScript</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    <body>
        
    <?php
    
    //Ejecuta la consulta.
   $conexion = new mysqli('localhost', 'root', '', 'tienda');
   $resultado = $conexion->query("SELECT * FROM producto");
   if($conexion->error != ''){
       echo "Ocurrió un error al ejecutar la consulta: {$conexion->error}";
       }
       // 3. Se muestran los datos:
       $datos = $resultado->fetch_assoc();
       ?>
    <div class="container"style="width:80%;">
                <div class="row">
                    <asside class="col-4 border"></asside>
                    <head class="col-4 border">    
                        <title>Tarea Asignación 3</title>
                    </head> 
                    <asside class="col-4"></asside>
                    
                <div class="row">
                    
                    <div class="col-3 border" style="background-color:aquamarine"></div>
                    <div class="col-6 border" style="background-color:rgb(204, 234, 210)" >
                        <header style="text-align:center; color:red">Pares del 50 al 2 sin incluir 10 ni 40</header>
                    <script>
                       let n =""; 
                         for  (let i=50; i>=2 ; i--){
                            if ( i!=10 && i!=40) {
                                document.write(i+ "\n" );  
                                 
                            }
                             i--;
                         }


                    </script>
                    <nav>
                        <a href="menutarea3.html">Regresar</a>
                    </nav>
                        <footer style="text-align:center;font-size:smaller">Autor : Rodrigo León Murillo</footer>
                    </div>
                    <div class="col-3 border" style="background-color:aquamarine"></div>
                </div>
            </div>
            <div class="row">
                <asside class="col-4"></asside>
                <head class="col-4">    
                    <title>Tarea Semana 2</title>
                </head> 
                <asside class="col-4"></asside>
                
            <div class="row">
                
                <div class="col-4 border" style="background-color:rgb(91, 73, 29)"> </div>
                <div class="col-4 border" style="background-color:rgb(230, 218, 187)" >
                    
                </div>
                <div class="col-4 border" style="background-color:rgb(148, 125, 69)"></div>
            </div>
        </div>
        
    </body>
  
</html>