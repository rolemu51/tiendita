
class Carrito   {
   constructor ( cantidad,fecha,linea,producto,usuario){
    
    this.cantidad=cantidad;
    this.fecha=fecha;
    this.linea=linea;
    this.producto=producto;
    this.usuario=usuario;
   }

}

class Interfaz {
    pintaProducto (cantidad,fecha,linea,producto,usuario){
        const carrito = new Carrito (cantidad,fecha,linea,producto,usuario);
        document.getElementById('respu').innerHTML=`
        <div id='nue' class="alert alert-primary" role="alert">
                Se logró insertar el dato en el carrito 
        </div>
        `;
        setTimeout(() => {
            
        }, 3000);
    }
    muestraError (e){
        document.getElementById('respu').innerHTML=`
        <div class="alert alert-danger" role="alert">
        Error al guardar el dato en el carrito el producto con id: ${e}  
      </div>
      `
        setTimeout(( ) => {
             document.getElementById("respu").innerHTML='';
        },  3000 ) 
    }

}


function agregaEnCarrito() {
   
    formulario=document.querySelector("#formulario"); 
    var datos = new FormData(formulario);
    
     
    fetch ('post.php', {
        method: 'POST',
        body: datos
    })
    console.log(document.getElementsByName("ide"))
   
    .then(res => res.json()  )
    .then(res => {
            const datosres = res.json();
            const ui = new Interfaz() ;
            if (datosres==='error'){
                    
                ui.muestraError(datosres) 
            }
            else {
                
                    ui.pintaProducto(data.cantidad,data.fecha,data.linea,data.producto,data.usuario); 
            }        

        })      
      return res.json();    

}

function verCarrito() {
    alert('hice click en ver carrito')

}


function borrarCarrito() {
    alert('hice click en borra carrito')

}


  
