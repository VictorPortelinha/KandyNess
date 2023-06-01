<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cadastro</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Styles/cadastro.css">
        
    </head>
    <body>   
        <div class="cadastro">
            <h1>Cadastro<span>.</span></h1>
            <div class="first">
                <form action="actionCadastro.php" method="post" enctype="multipart/form-data" id="cadastro">
                
                    <div class="control">
                            <label for="name" id="lbName">Nome</label>
                            <input type="text" name="name" id="name">
                            <div class="errors" id="errName"></div>
                        </div>
                        
                        <div class="control">
                            <label for="password" id="lbPassword">Senha</label>
                            <input type="password" name="password" id="password">
                            <div class="errors" id="errPassword">
                                <!-- - A senha precisa conter pelo menos 6 caracteres! <br>
                                - A senha precisa conter pelos menos 1 caractere especial! <br>
                                - A senha precisa conter pelo menos 1 número! <br> -->
                            </div>
                        </div>
                        
                        <div class="control">
                            <label for="matricula" id="lbMatricula">Matrícula</label>
                            <input type="text" name="matricula" id="matricula">
                            <div class="errors" id="errMatricula"></div>
                        </div>
                        
                        <div class="control">
                            <label for="cpf" id="lbCpf">CPF</label>
                            <input type="text" name="cpf" id="cpf">
                            <div class="errors" id="errCpf"><br>
                            </div>
                        </div>

                        <div class="control button">
                            <input type="button" id="continue" value="Continuar">
                        </div>
                </div>
        </div>         

                <div class="hidden" id="second">
                    <label for="radio" style="color:white">Tipo de conta</label>
                    <div class="radioDiv" name="radio">
                        <input type="radio" id="cliente" name="userType" value="cliente" checked="checked">
                        <label class="radioLabel" for="cliente">Cliente</label>
                        <input type="radio" id="vendedor" name="userType" value="vendedor">
                        <label class="radioLabel" for="vendedor">Vendedor</label>
                    </div>

                    <div class="control bottom">
                        <input type="submit" value="Enviar">
                    </div>
                </div>
  
    
                <div id="third" class="hidden">
                    <div class="control" style="margin-top: 30px;">
                        <label id="lbNomeLoja" for="nomeLoja">Nome da loja</label>
                        <input type="text" name="nomeLoja" id="nomeLoja">
                        <div style="margin-bottom: 30px;" class="errors" id="errNomeLoja"></div>
                    </div>
                    
                    <label id="lbDesc" for="descDiv">Descrição da loja</label>
                    <div class="control" name="descDiv">
                        <textarea name="desc" id="desc" rows="3" maxlength="100"></textarea>
                        <div class="errors" id="errDesc"></div>
                    </div>
                    
                    <div class="control">
                        <label style="color:white" for="imgLoja">Imagem da loja</label>
                        <input type="file" id="imgLoja" name="imgLoja" accept="image/png, image/jpeg">
                    </div>
                </div>
                    
                </form>

        </div>

    
        

        
        <script defer>
            const form = document.getElementById("cadastro")
            const first = document.getElementById("first")
            const second = document.getElementById("second")
            const third = document.getElementById("third")
            const continueBtn = document.getElementById("continue")

            //divs de erros
            const errName = document.getElementById("errName")
            const errPassword = document.getElementById("errPassword")
            const errMatricula = document.getElementById("errMatricula")
            const errCpf = document.getElementById("errCpf")
            const errNomeLoja = document.getElementById("errNomeLoja")
            const errDesc = document.getElementById("errDesc")
            
            //inputs
            //primeiro form
            const username = document.getElementById("name")
            const password = document.getElementById("password")
            const matricula = document.getElementById("matricula")
            const cpf = document.getElementById("cpf")
            //segundo
            const userType = document.querySelectorAll('input[name="userType"]');
            //terceiro
            const nomeLoja = document.getElementById("nomeLoja")
            const desc = document.getElementById("desc")
        

           //verificação do primeiro form e display do segundo
            continueBtn.addEventListener("click",() => {
                clearErrors([errName,errPassword,errMatricula,errCpf])
                let numErros = 0;
                
                let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
                let matriculaRegex = /[^0-9]/g
                
                if(nameRegex.test(username.value)){
                    errName.innerHTML += "- O nome só pode conter letras! <br>"
                    numErros ++
                }
                if(username.value.length < 3){
                    errName.innerHTML += "- O nome precisa conter pelo menos 3 caracteres! <br>"
                    numErros ++
                }
                if(password.value.length < 6){
                    errPassword.innerHTML += "- A senha precisa conter pelo menos 6 caracteres! <br>"
                    numErros ++
                }
                if(password.value.length > 16){
                    errPassword.innerHTML += "- A senha pode conter no máximo 16 caracteres! <br>"
                    numErros ++
                }
                if(matricula.value.length != 8){
                    errMatricula.innerHTML += "- A matrícula precisa exatamente 8 números! <br>"
                    numErros ++
                }
                if(matriculaRegex.test(matricula.value)){
                    errMatricula.innerHTML += "- A matrícula só pode conter números! <br>"
                    numErros ++
                }

                

                if(numErros == 0){
                    first.classList.add("hidden")
                    second.classList.remove("hidden")
                }
            })

            //verificação do segundo form e display do terceiro

            userType.forEach(radio => {
                radio.addEventListener("click",() => {
                    let selectedOption = document.querySelector('input[name="userType"]:checked');
                    if(selectedOption.value == "vendedor"){
                        third.classList.remove("hidden")          
                    }
                    else{
                        third.classList.add("hidden")
                        nomeLoja.value = ""
                        desc.value = ""
                }
                }
            )})
            
            form.addEventListener("submit",(e) => {
                clearErrors([errNomeLoja,errDesc])
                let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
                if(nameRegex.test(nomeLoja.value)){
                        e.preventDefault()
                        errNomeLoja.innerHTML += "- O nome da loja só pode conter letras! <br>"  
                        }
                if(nomeLoja.value.length < 3){
                        e.preventDefault()
                        errNomeLoja.innerHTML += "- O nome da loja precisa conter pelo menos 3 caracteres! <br>"
    
                        }
                if(desc.value.length < 5){
                        e.preventDefault()
                        errDesc.innerHTML += "- A descrição precisa conter pelo menos 5 caracteres! <br>"
                        }
            })



            function clearErrors(errors){
                errors.forEach(error => {
                    error.innerHTML = ""
                })
            }

            //labels(para animações)
            const nameLbl = document.getElementById("lbName")
            const passwordLbl = document.getElementById("lbPassword")
            const matriculaLbl = document.getElementById("lbMatricula")
            const cpfLbl = document.getElementById("lbCpf")
            const lojaLbl = document.getElementById("lbLoja")
            const descLbl = document.getElementById("lbDesc")

            //animações das labels
            username.addEventListener("focus",() => {
                nameLbl.style.color= "white"
            })
            username.addEventListener("blur",() => {
                nameLbl.style.color = "lightgray"
            })

            password.addEventListener("focus",() => {
                passwordLbl.style.color= "white"
            })
            password.addEventListener("blur",() => {
                passwordLbl.style.color = "lightgray"
            })

            matricula.addEventListener("focus",() => {
                matriculaLbl.style.color= "white"
            })
            matricula.addEventListener("blur",() => {
                matriculaLbl.style.color = "lightgray"
            })

            cpf.addEventListener("focus",() => {
                cpfLbl.style.color= "white"
            })
            cpf.addEventListener("blur",() => {
                cpfLbl.style.color = "lightgray"
            })

        </script>
    </body>
</html>