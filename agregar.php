<?php
    
 
  if( !isset( $_COOKIE["carrito"]) ){
    setcookie("carrito",'VACIO');

}
if (isset($_POST['id'])) {
    //echo "<h1>aca estoy</h1>";
    $id = $_POST['id'];
    
   if ($_COOKIE["carrito"]=="VACIO"){
        setcookie("carrito",$id) ; 
   } 
    else {
            setcookie("carrito",$_COOKIE["carrito"] .";" . $id   ) ;   
        }    
 }

?> 

  <!-- <a href="carga.php">"Regresar"</a>  -->

