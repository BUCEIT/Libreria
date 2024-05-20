//Pongo a escuchar la carga de la pagina
            window.addEventListener("load",inicia);
            //Referencio las variables
            var select; var option; var boton; var obj; var respuesta;
            var obj2; var respuesta2; var p; var dato;
            //Funcion principal
            function inicia(){
                //Referencio las variables
                select=document.getElementsByTagName("select")[0];
                boton=document.getElementsByTagName("button")[0];
                p=document.getElementsByTagName("p")[0];
                //Pongo a escuchar la carga en la funcion traer para que me cargue el desplegable
                traer();
                //Pongo a escuchar el change del select
                select.addEventListener("change",capsula);
                //Pongo a escuchar el click del boton para que me lo borre
                boton.addEventListener("click",borra);
            }
            //Creo la funcion traer
            function traer(){
                 //Primero se establece la conexion
                obj=new XMLHttpRequest();
                //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                obj.onreadystatechange=function(){
                    if((obj.status==200)&&(obj.readyState==4)){
                        respuesta=JSON.parse(obj.responseText);
                        //console.log(respuesta);
                        var i; 
                        //Creo los option
                        for(i=0;i<respuesta.length;i++){
                            option=document.createElement("option");
                            option.innerHTML=respuesta[i]["titulo"];
                            option.setAttribute("value",respuesta[i]["titulo"]);
                            select.appendChild(option);
                        }
                    }
                }
                //Tambien le puedo pasar parametros y variables a la vez que establezco la conexion concatenando en la url
                obj.open("get","../includes/traer.php?pag=3");//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                //Enviamos la peticion al servidor
                obj.send(); //En este punto el estado del readystate vale 2
            }
            //Creo una funcion que me meta en una variable el nombre del autor cada vez que cambie
            function capsula(){
            //console.log(select.value);
            dato=select.value;
            //console.log(dato);
            }
            //Creo la funcion borra
            function borra(){
                console.log(dato);
                 //Primero se establece la conexion
                obj2=new XMLHttpRequest();
                //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                obj2.onreadystatechange=function(){
                    if((obj2.status==200)&&(obj2.readyState==4)){
                        respuesta2=obj2.responseText;
                        //console.log(respuesta);
                        p.innerHTML=respuesta2;
                    }
                }
                //Tambien le puedo pasar parametros y variables a la vez que establezco la conexion concatenando en la url
                obj2.open("get","../includes/delete.php?pag=1&dato="+dato);//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                //Enviamos la peticion al servidor
                obj2.send(); //En este punto el estado del readystate vale 2
            }

