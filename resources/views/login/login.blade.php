<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="/resources/css/login/index.css" th:href="@{/resources/css/login/index.css}">

</head>
<body>

<div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="/resources/views/login/imagenes/avatarr.png"/>
                </div>



                <form class="col-12" >

                    <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group" id="user-group">
                        <input id="user" type="text" class="form-control" placeholder="Nombre de usuario" name="username"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input id="pass" type="password" class="form-control" placeholder="Contrasena" name="password"/>

                    </div>
                    <button id="enviar" type="button" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                </form>
                
            </div>
        </div>
    </div>
    

    <script> 
        const userinput = document.querySelector("#user")
        const passinput = document.querySelector("#pass")
        const botoninput = document.querySelector("#enviar")
        const token = document.querySelector("#_token")

        botoninput.addEventListener('click', enviarusuario)

        function enviarusuario(){
            

            let usuario = userinput.value;
            let contra = passinput.value;

            if(usuario == "" && contra == ""){
                alert('los campos no deben estar vacios');
            }else{
                

                FRespuesta(usuario, contra);
            }


        }


        /*function enviarinfo(usuario,contra){
        
            let form = new FormData();
            form.append("usuario",usuario)
            form.append("contra",contra)
            form.append("_token",token.value)

            

           
            let response = fetch("/login", {
                method:"post",
                body:form
            }).then(function (respuesta){
                console.log(respuesta);

                respuesta.json().then(function (json){
                    console.log(json)


                    if(json.error == true){
                        alert(json.mensaje)
                    }else{
                        window.location = "articulos"
                    }

            })

            }).catch((err) =>{
                console.error(err)
            })
            */


            //funcion asincrona (codigo simplificado)
            async function FRespuesta(usuario,contra){

                
            let form = new FormData();
            form.append("usuario",usuario)
            form.append("contra",contra)
            form.append("_token",token.value)

            
                try {

                    let response = await fetch("/login", {
                    method:"post",
                    body:form
                })

                    let json = await response.json()

                    if(json.error == true){
                        alert(json.mensaje)
                    }else{
                        window.location = "articulos"
                    }
                } catch (error) {
                    console.error(error)   
                }
            }
        
        
    </script>
</body>
</html>