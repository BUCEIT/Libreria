//Creo una clase para encapsularlo todo
            class Libro{
                 //Funcion especial constructor que inicializa el objeto
                constructor(i,t,au,g,ed,pr,pg){//Le he dado dos parametros para el nombre y la edad
                    this.isbn=i;
                    this.titulo=t;
                    this.autor=au;
                    this.genero=g;
                    this.editorial=ed;
                    this.precio=pr;
                    this.paginas=pg;
                }
            }
            //Paso de siempre
            window.addEventListener("load",inicia);
            //Declaro las variables
            var obj; var isbn; var titulo; var genero; var precio; var paginas; var autor; var editorial;
            var todos; var book; 
            var respuesta; var p;
            var obj2; var respuesta2;
            var obj3; var respuesta3;
            //hago la funcion inicia
            function inicia(){
                //Referencio las variables
                isbn=document.getElementsByTagName("input")[0];
                titulo=document.getElementsByTagName("input")[1];
                genero=document.getElementsByTagName("input")[2];
                precio=document.getElementsByTagName("input")[3];
                paginas=document.getElementsByTagName("input")[4];
                autor=document.getElementsByTagName("select")[0];
                editorial=document.getElementsByTagName("select")[1];
                todos=document.getElementsByTagName("input");
                boton=document.getElementsByTagName("button")[0];
                p=document.getElementsByTagName("p")[0];
                //Pongo a escuchar el click del boton
                boton.addEventListener("click",grabar);
                //Cargo autores
                traerAutores();
                traerEditoriales();
            }
            
            //Hago la funcion mostrar
            function grabar(){
                 var i;
                //Si ninguno de los 3 campos esta vacio
                if((isbn.value!="")&&(titulo.value!="")&&(genero.value!="")&&(precio.value!="")&&(paginas.value!="")&&(autor.value!="")&&(editorial.value!="")){
                    //Meto todo en la clase
                    book=new Libro(isbn.value,titulo.value,autor.value,genero.value,editorial.value,precio.value,paginas.value);
                    console.log(book);
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
                    obj.open("get","../includes/grabar.php?pag=3&dato="+JSON.stringify(book));//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                    //Enviamos la peticion al servidor
                    obj.send(); //En este punto el estado del readystate vale 2
                }
                //Dejo todo en blanco
                for(i=0;i<todos.length;i++){
                    todos[i].value="";
                }
                console.log(autor.value, editorial.value);
            }
            
            //Funcion traer autores
            function traerAutores(){
                //Primero se establece la conexion
                obj2=new XMLHttpRequest();
                //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                obj2.onreadystatechange=function(){
                    if((obj2.status==200)&&(obj2.readyState==4)){
                        respuesta2=JSON.parse(obj2.responseText);
                        console.log(respuesta2);
                        var i; var option;
                        for(i=0;i<respuesta2.length;i++){
                            option=document.createElement("option");
                            option.setAttribute("value",respuesta2[i]["codautor"]);
                            option.innerHTML=respuesta2[i]["nombre"];
                            autor.appendChild(option);
                        }
                    }
                }
                //Tambien le puedo pasar parametros y variables a la vez que establezco la conexion concatenando en la url
                obj2.open("get","../includes/traer.php?pag=1");//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                //Enviamos la peticion al servidor
                obj2.send(); //En este punto el estado del readystate vale 2
            }
            
            //Funcion que me trae las editoriales
            function traerEditoriales(){
                //Primero se establece la conexion
                obj3=new XMLHttpRequest();
                //Colocar el manejador de eventos, poner a escuchar el cambio de estado
                obj3.onreadystatechange=function(){
                    if((obj3.status==200)&&(obj3.readyState==4)){
                        respuesta3=JSON.parse(obj3.responseText);
                        console.log(respuesta3);
                        var i; var option;
                        for(i=0;i<respuesta3.length;i++){
                            option=document.createElement("option");
                            option.setAttribute("value",respuesta3[i]["nif"]);
                            option.innerHTML=respuesta3[i]["nombre"];
                            editorial.appendChild(option);
                        }
                    }
                }
                //Tambien le puedo pasar parametros y variables a la vez que establezco la conexion concatenando en la url
                obj3.open("get","../includes/traer.php?pag=2");//(metodo,url,si es asincrona,usuario,contraseña) Ahora el estado vale 1, 
                //Enviamos la peticion al servidor
                obj3.send(); //En este punto el estado del readystate vale 2
            }