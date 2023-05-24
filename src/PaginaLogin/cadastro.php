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
            <div class="control">
                <label for="name" id="lbName">Nome</label>
                <input type="text" name="name" id="name">
                <div class="errors">
                    - O nome escolhido não está mais disponível! <br>
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
                <input type="submit" value="Enviar">
            </div>
            <div class="link">
                <a href="login.php">Já possui uma conta?</a>
            </div>
        </form>
    </div>

    
        

        
        <script defer>
            const form = document.getElementById("cadastro")
            const username = document.getElementById("name")
            const nameLbl = document.getElementById("lbName")
            const password = document.getElementById("password")
            const passwordLbl = document.getElementById("lbPassword")

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

            form.addEventListener("submit",(e) => {
                let nameRegex = /[0-9!@#$%^&*()_+=[\]{};':",./<>?\\|`~\-]/g;
                if(nameRegex.test(username.value)){
                    e.preventDefault()
                    alert("aqui")
                }
            })

        </script>
    </body>
</html>