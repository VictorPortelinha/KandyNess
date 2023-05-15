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
        <h1>Kandyness <span>.</span></h1>
    </div>
    <div class="menuContainer">
        <div class="content">
            <a href="">Lojas</a>
            <a href="">Sobre nós</a>
        </div>
        <div class="UserProfile">
            <!-- imagem será colocada aqui depois que tivermos o banco de dados <span><img src=""></span> -->
        </div>
    </div>
</header>

<script>
    document.querySelector("ham").addEventListener("click",function(){
        document.querySelector("q").classList.toggle("a");
        document.querySelector("w").classList.toggle("b");
        document.querySelector("q").classList.toggle("c");
})    

</script>

<style>
    *{
        padding:0;
        margin:0;
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
        boder-radius:3px;
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

</style>