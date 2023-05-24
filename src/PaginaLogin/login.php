<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Styles/login.css">
        
    </head>
    <body>

    <div class="about">
    </div>

    <div class="loginContainer">
            <h1>Login</h1>
            <form action="#" id="login">
                <div class="control">
                    <label for="name" id="lbName">Nome</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="control">
                    <label for="password" id="lbPassword">Senha</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="control">
                    <input type="submit" value="Entrar">
                </div>
                <div class="link">
                    <a href="cadastro.php">Não possui uma conta?</a>
                </div>

            </form>
        </div>
         
        <script defer>
            const username = document.getElementById("name")
            const nameLbl = document.getElementById("lbName")
            const password = document.getElementById("password")
            const passwordLbl = document.getElementById("lbPassword")

            username.addEventListener("focus",() => {
                nameLbl.style.color= "orangered"
            })
            username.addEventListener("blur",() => {
                nameLbl.style.color = "blueviolet"})

            password.addEventListener("focus",() => {
                passwordLbl.style.color= "orangered"
            })
            password.addEventListener("blur",() => {
                passwordLbl.style.color = "blueviolet"
            })

           


            
        </script>
    </body>
</html>