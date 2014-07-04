<meta charset="utf-8"/>

<?php

function protegePagina() {
    if (!$_SESSION['nome']) {
        echo"<script>alert('voce não esta logado');location.href='/pageLogin.php'</script>";
    }
}

function sairPagina() {
    session_unset();
    echo "<script>location.href='/pageLogin.php'</script>";
}
?>


