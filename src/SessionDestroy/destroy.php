<?php
session_start();
if(isset($_SESSION)){
    session_destroy();
    
}
?>

<script>
    setTimeout(() =>{
    window.location.href = '../PaginaLogin/login.php'
},0)
</script>