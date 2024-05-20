//Creo una clase para encapsularlo todo
            class Autor{
                 //Funcion especial constructor que inicializa el objeto
                constructor(n,l,a){//Le he dado dos parametros para el nombre y la edad
                    this.nombre=n;
                    this.lugar=l;
                    this.nacimiento=a;
                }
            }
            //Paso de siempre
            window.addEventListener("load",inicia);
            //Declaro las variables
            var obj; var nombre; var lugar; var nacimiento; var boton;
            var todos; var persona; //var bolsa= new Array();
            var respuesta; var p;
            //hago la funcion inicia
            function inicia(){
                //Referencio las variables
                nombre=document.getElementsByTagName("input")[0];
                lugar=document.getElementsByTagName("input")[1];
                nacimiento=document.getElementsByTagName("input")[2];
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
                if((nombre.value!="")&&(lugar.value!="")&&(nacimiento.value!="")){
                    //Meto todo en la clase
                    persona=new Autor(nombre.value,lugar.value,nacimiento.value);
                    //meto la clase en la bolsa
                    //bolsa.push(persona);
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
                    obj.open("get","../includes/grabar.php?pag=1&dato="+JSON.stringify(persona));//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                    //Enviamos la peticion al servidor
                    obj.send(); //En este punto el estado del readystate vale 2
                }
                //Dejo todo en blanco
                for(i=0;i<todos.length;i++){
                    todos[i].value="";
                }
            }

