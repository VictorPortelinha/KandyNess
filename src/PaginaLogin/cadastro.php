<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="login.css">
        
    </head>
    <body>
       
       
    <div class="loginContainer">
        <h1>Cadastro</h1>
        <form action="#">
            <div class="control">
                <label for="name" id="lbName">Nome</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="control">
                <label for="password" id="lbPassword">Senha</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="control">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>

    
        

        
        <script defer>
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


        </script>
    </body>
</html>