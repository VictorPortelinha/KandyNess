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
        <h1>Sobre nós</h1>
        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id erat eget metus vulputate sagittis eu quis eros. Donec in cursus nisl. Mauris condimentum blandit magna ut fermentum. Integer sollicitudin purus quis aliquet eleifend. Cras quis sapien lectus. Morbi gravida tellus velit, eu venenatis lorem ullamcorper vitae. Curabitur nec lorem et ante eleifend porta quis eu purus. Suspendisse quis convallis dui, non aliquet felis. Suspendisse faucibus tincidunt ullamcorper. Donec vitae ornare augue. Praesent at nibh nibh. Sed posuere risus velit. Quisque pellentesque laoreet nisl, nec pharetra purus fermentum id.
        Sed dapibus elit ac augue vulputate, at tincidunt ex tincidunt. Nam imperdiet mattis urna. Vestibulum efficitur porttitor leo, vitae pellentesque nisi egestas ut. Proin hendrerit ipsum id justo malesuada maximus. Vestibulum sed aliquam tortor, laoreet commodo enim. Suspendisse aliquet nibh mi, quis consectetur ex ultrices eu. Curabitur aliquam posuere risus sed varius. Pellentesque commodo enim id tellus consequat euismod. Aliquam sit amet ornare metus. Aenean in ullamcorper magna, at varius nunc. Suspendisse nisi risus, molestie id velit eu, pretium congue arcu. Suspendisse mattis enim sed accumsan elementum.
        Mauris a efficitur dolor, nec ultricies ligula. Etiam aliquam facilisis auctor. Proin pharetra, enim sagittis feugiat luctus, eros est tristique elit, nec ullamcorper massa libero et libero. Mauris nec rhoncus turpis. Aliquam quam justo, malesuada et sem sed, suscipit pharetra dui. Integer fermentum accumsan iaculis. Maecenas gravida mattis libero. Aliquam id felis ante. Nullam mattis aliquam risus, eget tincidunt magna facilisis a. Duis ante lorem, egestas sed venenatis eget, malesuada nec odio.
        Maecenas ac volutpat lectus. Ut dignissim, felis eu tincidunt efficitur, tellus elit egestas diam, at accumsan quam tortor vitae justo. Praesent at arcu nec elit elementum eleifend non ac ligula. Integer aliquam elit est, non mollis tortor tincidunt quis. Praesent velit elit, tristique sit amet nisl nec, varius pharetra sem. Etiam pretium mauris porttitor est fringilla, et mollis sapien tempor. In ac dignissim libero. Morbi eget rhoncus lacus. Nulla facilisi.</h3>
        <div class="kandy">
            Kandy<span style="color:blueviolet">ness</span>
        </div>
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