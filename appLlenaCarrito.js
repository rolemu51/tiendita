
let arrCarrito=[];

class Carrito   {
    constructor ( cantidad,fecha,linea,producto,usuario){
     this.cantidad=cantidad;
     this.fecha=fecha;
     this.linea=linea;
     this.producto=producto;
     this.usuario=usuario;
    }

  insertaEnArregloCarrito(elemento){
   arrCarrito.push(elemento);
    console.log(arrCarrito);
  }
 }
 
 class Interfaz {
     muestraRespuesta (cantidad,fecha,linea,producto,usuario){
         const carrito = new Carrito (cantidad,fecha,linea,producto,usuario);
         document.getElementById('respu').innerHTML=`
         <div class="alert alert-success" role="alert">
         Se logró insertar el dato en el carrito  
       </div>`;
         setTimeout(( ) => {
          document.getElementById("respu").innerHTML='';
          },  3000 ) 
     }
     muestraError (e){
         document.getElementById('respu').innerHTML=`
         <div class="alert alert-danger" role="alert">
         Error al guardar el dato en el carrito: ${e}  
       </div>`
         setTimeout(( ) => {
              document.getElementById("respu").innerHTML='';
         },  3000 ) 
     }
 }
 
 function agregaEnCarrito() {
     let conexion = new XMLHttpRequest();
     let ui = new Interfaz() ;
     conexion.onload = function(){    
                       
        if(conexion.status == 200){
       
            var cantidad=1;
            var fecha = Date();
            var linea =1;
            var producto=document.querySelector("#ide").textContent;
            var usuario="rolemu";
            
            var elemento = new Carrito(cantidad,fecha,linea,producto,usuario);
            elemento.insertaEnArregloCarrito(elemento);
            ui.muestraRespuesta(cantidad,fecha,linea,producto,usuario);             
        }
        else{
            ui.muestraError( conexion.status )           
        }
    }  
    // Se prepara la conexión, con los datos en la URL.
    conexion.open("POST", "post.php");
    // 4) Se configura el encabezado de la solicitud para indicar que los datos que se envían corresponden a un datos codificados de formulario.
    conexion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    id=document.querySelector("#ide").textContent;
    let datos = encodeURIComponent("ide") + "=" + encodeURIComponent(id); 
    // 5) Se efectúa la conexión 
    conexion.send(datos);       
 }
 function verCarrito() {
     alert('hice click en ver carrito')
 }
 function borrarCarrito() {
     alert('hice click en borra carrito')
 }
 
 
   
 