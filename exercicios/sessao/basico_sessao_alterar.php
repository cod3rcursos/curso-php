<?php
session_start();
print_r($_SESSION);
?>

<?php
$_SESSION['email'] = 'gabrielfilho_alterado@emailaz.com.br';
?>

<p>
    <b>Nome: </b> <?= isset($_SESSION['nome'])? $_SESSION['nome']: "" ?><br>
    <b>Email: </b> <?= isset($_SESSION['email'])? $_SESSION['email']: "" ?>
</p>


<p>
    <a href='basico_sessao.php'>Voltar</a>
</p>
<p>
    <a href='basico_sessao_limpar.php'>Limpar Sessão</a>
</p>