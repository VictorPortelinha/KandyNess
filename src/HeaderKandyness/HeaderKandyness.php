<header class="container">
    <div class="burgerContainer" onclick="openMenu()">
        <div class="ham">
            <div class="bur">
                <span class="ger q"></span>
                <span class="ger w"></span>
                <span class="ger e"></span>
            </div>
        </div>
    </div>
    <div class="brand">
        <h1>Kandy<span>ness</span></h1>
    </div>
    <div class="menuContainer">
        <div class="content" onclick="location.href='../PaginaVendedores/vendedores.php'">
            <h1>LOJAS</h1>
        </div>
        <div class="content" onclick="location.href='../MinhaLoja/minhaLoja.php'">
            <h1>MINHA LOJA</h1>
        </div>
        <div class="content" onclick="location.href='../PaginaCompra/compra.php'">
            <h1>CARRINHO</h1>
        </div>
        <div class="rightDiv">
            <div class="userProfile" id="userProfile">
                VP<!-- imagem será colocada aqui depois que tivermos o banco de dados <span><img src=""></span> -->
            </div>
        </div>
    </div>
</header>
<div class="userMenu" id="userMenu">
    <button onclick= "window.location = '../SessionDestroy/destroy.php'" class="logout">Sair</button>
</div>



<script>
//     document.querySelector("ham").addEventListener("click",function(){
//         document.querySelector("q").classList.toggle("a");
//         document.querySelector("w").classList.toggle("b");
//         document.querySelector("q").classList.toggle("c");
const userProfile = document.getElementById("userProfile")
const userMenu = document.getElementById("userMenu")

userProfile.addEventListener("click", () => {
    if(userMenu.style.display == "none"){
        userMenu.style.display = "flex";
    }
    else{
        userMenu.style.display = "none";
    }
})






   
// })    

</script>

<style>
    *{
        padding:0;
        margin:0;
    }

    header{
        width:100%;
        height:5rem;
        margin:0 auto;
        background:white;
        display:flex;
        align-items: center;
        grid-auto-flow:column;
        grid-template-rows:100%;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
        background-color: #f5f5f5;

    }

    .userMenu{
        width: 100px;
        height: 100px;
        background-color: white;
        border-radius: 1vmin;
        position: absolute;
        right: 20px;
        display: none;
        flex-direction: column;
        align-items: center;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
        z-index: 2;
    }

    .logout{
        background-color: blueviolet;
        width: 80%;
        color: white;
        font-size: 15px;
        margin-top: 15px;
    }

    .logout:hover{
        cursor: pointer;
        filter: brightness(0.8);
    }

    .rightDiv{
        position: relative;
        margin-right: 30px;
        width: 150px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
   
    .brand{
        display:flex;
        justify-content: first baseline;
        align-items: center;
        margin-left: 20px;
        font-family: "Roboto", sans-serif;
    }
    .brand h1{
        color:blueviolet;
        font-weight: 300;
    }
    .brand span{
        color:orangered;
    }

    .userProfile{
        height: 55px;
        width: 55px;
        background-color: orangered;
        color: white;
        border-radius: 5vmin;
        margin-left: 20px;
        margin-right: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        font-family: "Roboto", sans-serif;
    }

    .userProfile:hover{
        cursor: pointer;
        filter: brightness(0.8);
    }

    .menuContainer{
        position: absolute;
        right: 0px;
        display:flex;
        align-items:center;
        gap: 20px;
        z-index: 1;
    }

    .content a{
        color:black;
        text-decoration:none;
        margin:10px;
        font-size:1rem;
        font-weight:bold;
        transition:0.1s;
    }

    .content{
        font-family: "Roboto", sans-serif;
        width: 140px;
        height: 50px;
        font-size: 22px;
        right:35px;
        color:blueviolet;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .content:hover{
        cursor:pointer;
        background-color: hsl(0, 0%, 65%);
        color: orangered;
        border-radius: 1vmin;
    }

    .content h1{
        font-size: 22px;
        font-weight: 400;
    }


    .ham{
        width:50px;
        height:50px;
        border-radius:50px;
        display:flex;
        justify-content:center;
        align-items:center;
        cursor:pointer;
        transition:0.2s;
        transform:scale(1);
    }
    .ham:hover{
        box-shadow:0 0 10px rgba(0,0,0,0.2);
    }
    .bur{
        width:20px;
        height:20px;
        display:flex;
        justify-content: space-between;
        flex-direction:column

    }
    .ger{
        width:20px;
        height:3px;
        border-radius:3px;
        background: rgb(109,109,109);
        transition:0.5s;
    }
    .q{
        transform-origin:0 9;

    }
    .e{
        transform-origin:0 100%;
    }
    .q.a{
        transform:rotate(46.5deg);
        width:28px;
    }
    .w.b{
        opacity:0;
        transform:scale();
    }
    .e.c{
        transform:rotate(-45deg) translate(0.5px,1.5px);
        width:28px;
    }
    @media(max-width:992px){
        .content a{
            font-size:0.8rem;
        }
    }
    @media(max-width:768px){
        body{
            background-color: #f7f7f7;
        }
        header{
            grid-template-colums: 4fr 0.5fr;
            box-shadow: o 10px 10px rgba(0,0,0,0.1);
        }
        .brand{
            justify-content:flex-start;
            padding-left:12%;
        }
        .burgerContainer{
            display:flex;
            align-items:center;
            justify-content: center;

        }
        .menuContainer{
            position:absolute;
            width:100%;
            height:fit-content;
            margin:0 auto;
            padding:30px 0 30px 0;
            box-sizing: border-box;
            background:white;
            justify-content: flex-start;
            align-items:center;
            flex-direction:column;
            z-index:-1;
            transition:0.3s;
            transform: translate(0,-250px);
        }
        .menuContainer.show{
            transform:translate(0,29%)
        }
        .first{
            display:flex;
            align-items:center;
            justify-content: center;
            flex-direction:column;
        }
    }

</style>