<?php
session_start();
if(isset($_SESSION)){
    session_destroy();
    echo "Session destruida com sucesso";
}
?>

<script>
    setTimeout(() =>{
    window.location.href = '../PaginaLogin/login.php'
},4000)
</script>