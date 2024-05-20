//Creo una clase para encapsularlo todo
            class Editorial{
                 //Funcion especial constructor que inicializa el objeto
                constructor(ni,n,t,d){//Le he dado dos parametros para el nombre y la edad
                    this.nif=ni;
                    this.nombre=n;
                    this.telefono=t;
                    this.direccion=d;
                }
            }
            //Paso de siempre
            window.addEventListener("load",inicia);
            //Declaro las variables
            var obj; var nombre; var nif; var telefono; var direccion; var boton;
            var todos; var empresa; 
            var respuesta; var p;
            //hago la funcion inicia
            function inicia(){
                //Referencio las variables
                nif=document.getElementsByTagName("input")[0];
                nombre=document.getElementsByTagName("input")[1];
                telefono=document.getElementsByTagName("input")[2];
                direccion=document.getElementsByTagName("input")[2];
                todos=document.getElementsByTagName("input");
                boton=document.getElementsByTagName("button")[0];
                p=document.getElementsByTagName("p")[0];
                //Pongo a escuchar el click del boton
                boton.addEventListener("click",grabar);
            }
            //Hago la funcion mostrar
            function grabar(){
                 var i;
                //Si ninguno de los 3 campos esta vacio
                if((nombre.value!="")&&(telefono.value!="")&&(nif.value!="")&&(direccion.value!="")){
                    //Meto todo en la clase
                    empresa=new Editorial(nif.value,nombre.value,telefono.value,direccion.value);
                    //Primero establecemos la conexion con el servidor asi que construimos el objeto xml...
                    obj= new XMLHttpRequest();
                    //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                    obj.onreadystatechange=function(){
                        if((obj.status==200)&&(obj.readyState==4)){
                            respuesta=obj.responseText;
                            //console.log(respuesta);
                            p.innerHTML=respuesta;
                        }
                    }
                    //Tambien le puedo pasar parametros y variables a la vez que establezco la conexion concatenando en la url
                    obj.open("get","../includes/grabar.php?pag=2&dato="+JSON.stringify(empresa));//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                    //Enviamos la peticion al servidor
                    obj.send(); //En este punto el estado del readystate vale 2
                }
                //Dejo todo en blanco
                for(i=0;i<todos.length;i++){
                    todos[i].value="";
                }
            }