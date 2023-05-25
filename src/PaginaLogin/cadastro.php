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
    
    <div class="about">

    </div>
    <div class="cadastro">
        <h1>Cadastro</h1>
        <form action="#" id="cadastro">
            
            <div id="first">
                <div class="control">
                        <label for="name" id="lbName">Nome</label>
                        <input type="text" name="name" id="name">
                        <div class="errors">
                            - O nome só pode conter letras! <br>
                            - O nome precisa conter pelo menos 3 caracteres! <br>
                        </div>
                    </div>
                    
                    <div class="control">
                        <label for="password" id="lbPassword">Senha</label>
                        <input type="password" name="password" id="password">
                        <div class="errors">
                            - A senha precisa conter pelo menos 6 caracteres! <br>
                            - A senha precisa conter pelos menos 1 caractere especial! <br>
                            - A senha precisa conter pelo menos 1 número! <br>
                        </div>
                    </div>
                    
                    <div class="control">
                        <label for="matricula" id="lbMatricula">Matrícula</label>
                        <input type="text" name="matricula" id="matricula">
                        <div class="errors">
                            - A senha precisa conter pelo menos 6 caracteres! <br>
                        </div>
                    </div>
                    
                    <div class="control">
                        <label for="cpf" id="lbCpf">CPF</label>
                        <input type="text" name="cpf" id="cpf">
                        <div class="errors">
                            - A senha precisa conter pelo menos 6 caracteres! <br>
                        </div>
                    </div>

                    <div class="control bottom">
                        <input type="button" id="continue" value="Continuar">
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
                    <label for="nomeLoja">Nome da loja</label>
                    <input type="text" name="nomeLoja" id="nomeLoja">
                </div>
                
                <label for="descDiv">Descrição da loja</label>
                <div class="control" name="descDiv">
                    <textarea name="desc" id="desc" rows="3" maxlength="100"></textarea>
                </div>
                
                <div class="control">
                    <label for="imgLoja">Imagem da loja</label>
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
            
            //inputs
            const username = document.getElementById("name")
            const password = document.getElementById("password")
            const matricula = document.getElementById("matricula")
            const cpf = document.getElementById("cpf")
            const continueBtn = document.getElementById("continue")
            const userType = document.querySelectorAll('input[name="userType"]');
            
            //labels(para animações)
            const nameLbl = document.getElementById("lbName")
            const passwordLbl = document.getElementById("lbPassword")
            const matriculaLbl = document.getElementById("lbMatricula")
            const cpfLbl = document.getElementById("lbCpf")

           //verificação do primeiro form e display do segundo
            continueBtn.addEventListener("click",() => {
                let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
                if(nameRegex.test(username.value)){
                    alert("aqui")
                }
                first.classList.add("hidden")
                second.classList.remove("hidden")
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
                        
                    }
                }
                )})
            
            


            form.addEventListener("submit",(e) => {
                e.preventDefault()
            })



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