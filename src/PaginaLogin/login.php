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

        <div class="loginContainer">
            <h1>Login<span>.</span></h1>
            <form action="actionLogin.php" method="post" id="login">
                <div class="control">
                    <label for="matricula" id="lbmatricula">Matrícula</label>
                    <input type="text" name="matricula" id="matricula">
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
            const matricula = document.getElementById("matricula")
            const matriculaLbl = document.getElementById("lbmatricula")
            const password = document.getElementById("password")
            const passwordLbl = document.getElementById("lbPassword")

            matricula.addEventListener("focus",() => {
                matriculaLbl.style.color= "orangered"
            })
            matricula.addEventListener("blur",() => {
                matriculaLbl.style.color = "blueviolet"})

            password.addEventListener("focus",() => {
                passwordLbl.style.color= "orangered"
            })
            password.addEventListener("blur",() => {
                passwordLbl.style.color = "blueviolet"
            })


            
        </script>
    </body>
</html>