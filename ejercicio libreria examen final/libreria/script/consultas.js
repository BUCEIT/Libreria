 //Pongo a escuchar la funcion principal que se ejecuta al cargar
            window.addEventListener("load",inicia);
            //Declaro las variables
            var boton1; var boton2; var boton3; var boton4; var todos;
            var obj; var respuesta; var section; 
            var select; var option; var article; var input;
            //Creo la funcion principal 
            function inicia(){
                var i;
                //Referencio las variables
                boton1=document.getElementsByTagName("button")[0];
                boton2=document.getElementsByTagName("button")[1];
                boton3=document.getElementsByTagName("button")[2];
                boton4=document.getElementsByTagName("button")[3];
                todos=document.getElementsByTagName("button");
                section=document.getElementsByTagName("section")[0];
                article=document.getElementsByTagName("article")[0];
                //Pongo a escuchar el click de todos
                for(i=0;i<todos.length;i++){
                    todos[i].addEventListener("click",generar);
                }
               
            }
            //Hago la funcion generar para que me genere los comandos sql
            function generar(){
                    var p; var i; var h2; 
                    //console.log(this.id);
                    //Si damos al primer boton
                    if(this.id==1){
                        //console.log(this.id);
                        obj= new XMLHttpRequest();
                        //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                        obj.onreadystatechange=function(){
                            if((obj.status==200)&&(obj.readyState==4)){
                                //Recojo lo que me llega
                                respuesta=JSON.parse(obj.responseText);
                                //Creo todo
                                section.innerHTML="";
                                article.innerHTML="";
                                h2=document.createElement("h2");
                                h2.innerHTML="Libros en stock";
                                section.appendChild(h2);
                                for(i=0;i<respuesta.length;i++){
                                    p=document.createElement("p");
                                    p.innerHTML="Autor: "+respuesta[i]["nombre"]+" - Libro "+respuesta[i]["titulo"]+" - Precio "+respuesta[i]["precio"]+"€";
                                    section.appendChild(p);
                                }
                            }
                        }
                        obj.open("get","../includes/generar.php?pag="+this.id);//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                        //Enviamos la peticion al servidor
                        obj.send(); //En este punto el estado del readystate vale 2
                    }
                    
                    //Si damos al segundo boton
                    if(this.id==2){
                        //console.log(this.id);
                        obj= new XMLHttpRequest();
                        //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                        obj.onreadystatechange=function(){
                            if((obj.status==200)&&(obj.readyState==4)){
                                //Recojo lo que me llega
                                respuesta=JSON.parse(obj.responseText);
                                //console.log(respuesta);
                                //Lo dejo todo en blanco y hago todo el proceso
                                section.innerHTML="";
                                article.innerHTML="";
                                h2=document.createElement("h2");
                                h2.innerHTML="Libros por editorial";
                                section.appendChild(h2);
                                //Ahora creo el select y dentro los option
                                select=document.createElement("select");
                                select.setAttribute("class","form-control col-sm-10 col-md-10 col-lg-4");
                                section.appendChild(select);
                                //Creo los option
                                for(i=0;i<respuesta.length;i++){
                                    option=document.createElement("option");
                                    option.innerHTML=respuesta[i]["nombre"];
                                    select.appendChild(option);
                                }
                                //Pongo a escuchar el cambio de select
                                //select.addEventListener("change",cambiarEditorial);
                                select.addEventListener("change",function(){
                                    var obj2; var p; var respuesta2; var i;
                                    //Primero borro los p para que no se repita
                                    article.innerHTML="";
                                    //console.log(select.value);
                                    obj2= new XMLHttpRequest();
                                    //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                                    obj2.onreadystatechange=function(){
                                        if((obj2.status==200)&&(obj2.readyState==4)){
                                            //Recojo lo que me llega
                                            respuesta2=JSON.parse(obj2.responseText);
                                            //console.log(respuesta2);
                                            //console.log(select.value);
                                            //lo trato
                                            for(i=0;i<respuesta2.length;i++){
                                             p=document.createElement("p");
                                             p.innerHTML="Autor: "+respuesta2[i]["nomautor"]+" - Libro "+respuesta2[i]["titulo"];
                                             article.appendChild(p);   
                                            }
                                        }
                                    }
                                    obj2.open("get","../includes/generar.php?pag=2&edi="+select.value);
                                    //Enviamos la peticion al servidor
                                    obj2.send();
                                });
                            }
                        }
                        //obj.open("get","../includes/generar.php?pag="+this.id);//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                        obj.open("get","../includes/traer.php?pag="+this.id);
                        //Enviamos la peticion al servidor
                        obj.send(); //En este punto el estado del readystate vale 2
                    }
                    
                    //Si damos al tercer boton
                    if(this.id==3){
                    //Lo dejo en blanco todo
                    section.innerHTML="";
                    article.innerHTML="";
                    //le meto un titulo y un input
                     h2=document.createElement("h2");
                     h2.innerHTML="Busqueda de libros";
                     section.appendChild(h2);
                    //Creo el input
                    input=document.createElement("input");
                    input.setAttribute("type","text");
                    input.setAttribute("class","form-control col-sm-10 col-md-10 col-lg-4");
                    section.appendChild(input);
                    input.addEventListener("keyup",Lib);
                    //Creo un boton de buscar al que referencio luego
                    var buscar;
                    buscar=document.createElement("button"); //Lo creo
                    buscar.innerHTML="buscar"; //Le meto html
                    buscar.setAttribute("class","btn btn-danger")
                    section.appendChild(buscar); //Se lo agrego al section
                    //Pongo a escuchar el boton
                    buscar.addEventListener("click",PintaLib);
                }
                
                //Si le doy al boton 4
                if(this.id==4){
                //Si doy al 4 primero cargo el nombre de los autores
                //console.log(this.id);
                obj= new XMLHttpRequest();
                //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                obj.onreadystatechange=function(){
                    if((obj.status==200)&&(obj.readyState==4)){
                        //Recojo lo que me llega
                        respuesta=JSON.parse(obj.responseText);
                        console.log(respuesta);
                        //Ahora lo trato
                        section.innerHTML="";
                        article.innerHTML="";
                        h2=document.createElement("h2");
                        h2.innerHTML="Libros por autor";
                        section.appendChild(h2);
                        //Ahora creo el select y dentro los option
                        select=document.createElement("select");
                        select.setAttribute("class","form-control col-sm-10 col-md-10 col-lg-4");
                        section.appendChild(select);
                        for(i=0;i<respuesta.length;i++){
                                    option=document.createElement("option");
                                    option.innerHTML=respuesta[i]["nombre"];
                                    select.appendChild(option);
                                }
                        //Pongo a escuchar el cambio de select
                                select.addEventListener("change",function(){
                                    var obj2; var p; var respuesta2; var i;
                                    //Primero borro los p para que no se repita
                                    article.innerHTML="";
                                    //console.log(select.value);
                                    obj2= new XMLHttpRequest();
                                    //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                                    obj2.onreadystatechange=function(){
                                        if((obj2.status==200)&&(obj2.readyState==4)){
                                            //Recojo lo que me llega
                                            respuesta2=JSON.parse(obj2.responseText);
                                            console.log(respuesta2);
                                            //console.log(select.value);
                                            //lo trato
                                            for(i=0;i<respuesta2.length;i++){
                                             p=document.createElement("p");
                                             p.innerHTML="Libro: "+respuesta2[i]["titulo"]+" - Genero: "+respuesta2[i]["genero"];
                                             article.appendChild(p);   
                                            }
                                        }
                                    }
                                    obj2.open("get","../includes/generar.php?pag=4&autor="+select.value);
                                    //Enviamos la peticion al servidor
                                    obj2.send();
                                });
                        }
                    }
                obj.open("get","../includes/traer.php?pag=1");
                //Enviamos la peticion al servidor
                obj.send(); //En este punto el estado del readystate vale 2
                }
            }
            
            //Funcion que me marca los input en rojo o en verde
            function Lib(){
            //Si doy al intro
            if(event.keyCode==13){ //Codigo ascii del intro
                PintaLib(); //Me manda a la funcion de buscar
            }
                console.log(input.value);
                        //Hago que me busque las coincidencias de los nombres
                        obj= new XMLHttpRequest();
                        //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                        obj.onreadystatechange=function(){
                            if((obj.status==200)&&(obj.readyState==4)){
                                //Si todo ha ido correcto
                                //respuesta=responseText(obj);
                                respuesta=JSON.parse(obj.responseText);
                                //Veo que llega
                                //console.log(respuesta);
                                //Ahora hago que se ponga en rojo si no coincide y en verde si coincide
                                if(respuesta.length==0){
                                    input.setAttribute("id","rojo");
                                }else{
                                    input.setAttribute("id","verde");
                                }
                            }
                        }
                        obj.open("get","../includes/generar.php?pag=3&tex="+input.value);
                        //Enviamos la peticion al servidor
                        obj.send(); //En este punto el estado del readystate vale 2
            }
            
            //Funcion que me pinta los apartados del boton 3
            function PintaLib(){
            var obj3; var respuesta3; var i;
            //Ahora borro el article y lo pinto todo
            article.innerHTML="";
            //Hago que me busque las coincidencias de los nombres
            obj3= new XMLHttpRequest();
            //Colocar el manejador de eventos, poner a escuchar el cambio de estado
            obj3.onreadystatechange=function(){
                //Si todo esta ok
                if((obj3.status==200)&&(obj3.readyState==4)){
                    respuesta3=JSON.parse(obj3.responseText);
                    //Veo lo que viene
                    //console.log(respuesta3);
                    //Trato lo que viene
                    for(i=0;i<respuesta.length;i++){
                    p=document.createElement("p");
                    p.innerHTML="titulo: "+respuesta3[i]["titulo"]+" - Precio "+respuesta3[i]["precio"]+"€ - Numero de paginas: "+respuesta3[i]["paginas"]+" - Nombre de la editorial - "+respuesta3[i]["nombre"];
                    article.appendChild(p);
                        }
                    }
                }
            obj3.open("get","../includes/generar.php?pag=3&tex="+input.value);
            //Enviamos la peticion al servidor
            obj3.send(); //En este punto el estado del readystate vale 2
            }